<?php

namespace App\Http\Controllers;

use App\Models\CapturePost;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class WebhookController extends Controller
{
    public function handleBoldWebhook(Request $request)
    {
        // Capturar todo el JSON sin modificar
        $jsonData = $request->getContent();

        CapturePost::create([
            'capturar' => $jsonData
        ]);

        // Obtener la firma y el contenido del mensaje
        $signature = $request->header('x-bold-signature');
        $strMessage = $request->getContent();
        $encoded = base64_encode($strMessage);

        // Crear HMAC usando la llave secreta
        /*  $secretKey = ''; */  // Define tu llave secreta aquí
        $secretKey = config('services.bold.secret_key');
        $hashed = hash_hmac('sha256', $encoded, $secretKey);

        // Comparar las firmas
        if (!hash_equals($hashed, $signature)) {


            // Enviar respuesta 400 inmediatamente si la firma es inválida
            http_response_code(400);
            echo 'Invalid signature';
            return response('Invalid signature', 400);
        }

        // Responder 200 inmediatamente si la firma es válida
        http_response_code(200);
        echo 'Valid request';

        // Procesar el webhook de manera asíncrona o tras la respuesta inmediata
        try {
            // Parsear el payload como JSON
            $payload = json_decode($strMessage, true);

            // Verificar si el payload es válido
            if (!$payload) {
                Log::warning('Invalid webhook payload');
                return response('Invalid payload', 400);
            }

            // Procesar el payload y guardar la información
            DB::transaction(function () use ($payload) {
                // Guardar la información de pago
                $this->savePayment($payload);

                // Actualizar el estado de la orden
                $this->updateOrderStatus($payload);
            });
        } catch (\Exception $e) {
            Log::error('Error al procesar el webhook: ' . $e->getMessage());
        }

        // Retornar respuesta 200, aunque ya fue enviada al principio.
        return response('OK', 200);
    }

    protected function savePayment(array $payload)
    {
        Payment::create([
            'notification_id' => $payload['id'] ?? null,
            'type' => $payload['type'] ?? null,
            'subject' => $payload['subject'] ?? null,
            'source' => $payload['source'] ?? null,
            'spec_version' => $payload['spec_version'] ?? null,
            'time' => $payload['time'] ?? null,
            'payment_gateway' => 'Bold',

            // Información de pago (dentro de 'data')
            'payment_id_generated' => $payload['data']['payment_id'] ?? null,
            'merchant_id' => $payload['data']['merchant_id'] ?? null,
            'user_id' => $payload['data']['user_id'] ?? null,
            'total_amount' => $payload['data']['amount']['total'] ?? null,
            'tip' => $payload['data']['amount']['tip'] ?? null,
            'reference' => $payload['data']['metadata']['reference'] ?? null,

            // Información de la tarjeta (dentro de 'data' -> 'card')
            'cardholder_name' => $payload['data']['card']['cardholder_name'] ?? null,
            'franchise' => $payload['data']['card']['brand'] ?? null,

            // Información adicional
            'payment_method' => $payload['data']['payment_method'] ?? null,
            'taxes' => json_encode($payload['data']['amount']['taxes'] ?? []),

            // Almacenar cualquier dato adicional desconocido
            'unknown_data' => json_encode($payload),
        ]);
    }

    /*  protected function updateOrderStatus(array $payload)
    {
        // Buscar la orden usando el número de referencia
        $order = Order::where('public_order_number', $payload['data']['metadata']['reference'])->first();

        switch ($payload['type']) {
            case 'SALE_APPROVED':
                $status = 2;
                break;
            case 'SALE_APPROVED':
                $status = 2;
                break;
            case 'SALE_REJECTED':
                $status = 6;
                break;
            case 'VOID_APPROVED':
                $status = 7;
                break;
            case 'VOID_REJECTED':
                $status = 8;
                break;
            default:
                $status = 9;
                break;
        }

        if ($order) {
            $order->update([
                'status' => $status,
            ]);
        } else {
            Log::warning('Order not found for reference: ' . $payload['data']['metadata']['reference']);
        }
    } */

    public function handleWompiWebhook(Request $request)
    {
        // Obtener datos del evento
        $payload = $request->all();

        // Validar si el evento es válido
        if (!$this->isValidEvent($payload)) {
            Log::warning('Wompi Webhook: Firma inválida.', ['payload' => $payload]);
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Verificar que sea el evento de actualización de transacción
        if ($payload['event'] === 'transaction.updated') {
            $this->updateOrderStatus($payload['data']['transaction']);
        }

        return response()->json(['message' => 'Webhook received']);
    }

    private function isValidEvent(array $payload): bool
    {
        // Obtén el secreto de eventos de Wompi desde .env
        $secret = env('WOMPI_WEBHOOK_SECRET');

        if (!isset($payload['signature'], $payload['signature']['checksum'])) {
            return false;
        }

        // Concatenar los valores de `properties`
        $concatenatedString = '';
        foreach ($payload['signature']['properties'] as $property) {
            $concatenatedString .= data_get($payload['data'], $property, '');
        }

        // Agregar timestamp y el secreto
        $concatenatedString .= $payload['timestamp'] . $secret;

        // Calcular el hash SHA256
        $computedChecksum = hash('sha256', $concatenatedString);

        // Comparar con el checksum recibido
        return hash_equals($computedChecksum, $payload['signature']['checksum']);
    }

    private function updateOrderStatus(array $transaction)
    {
        $order = Order::where('public_order_number', $transaction['reference'])->first();

        if (!$order) {
            Log::warning('Wompi Webhook: Orden no encontrada.', ['reference' => $transaction['reference']]);
            return;
        }

        // Definir el nuevo estado basado en el estado de Wompi
        $statusMap = [
            'APPROVED'  => 2,
            'VOIDED'    => 2,
            'DECLINED'  => 6,
            'ERROR'     => 2,
        ];

        if (isset($statusMap[$transaction['status']])) {
            $order->update(['status' => $statusMap[$transaction['status']]]);
            Log::info('Wompi Webhook: Estado de la orden actualizado.', [
                'order_id' => $order->id,
                'new_status' => $statusMap[$transaction['status']],
            ]);
        }
    }
}
