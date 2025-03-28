<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentWebhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WebhookBoldController extends Controller
{
    public function handleBoldWebhook(Request $request)
    {
        // Obtener la firma y el contenido del mensaje
        $signature = $request->header('x-bold-signature');
        $strMessage = $request->getContent();
        $encoded = base64_encode($strMessage);

        //En modo pruebas LLAVE_SECRETA no se ingresa ej: $secretKey = '';
        // Crear HMAC usando la llave secreta
        //$secretKey = '';  // modo pruebas.
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

                PaymentWebhook::create([
                    'payment_gateway' => 'bold',
                    'reference' => $payload['data']['metadata']['reference'], // Relaciona con el pedido
                    'payload' => $payload,
                ]);

                // Actualizar el estado de la orden
                $this->updateOrderStatus($payload);
            });
        } catch (\Exception $e) {
            Log::error('Error al procesar el webhook: ' . $e->getMessage());
        }

        // Retornar respuesta 200, aunque ya fue enviada al principio.
        return response('OK', 200);
    }

    protected function updateOrderStatus(array $payload)
    {
        // Buscar la orden usando el número de referencia
        $order = Order::where('public_order_number', $payload['data']['metadata']['reference'])->first();

        switch ($payload['type']) {
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
                'payment_method' => 'bold',
            ]);
        } else {
            Log::warning('Order not found for reference: ' . $payload['data']['metadata']['reference']);
        }
    }
}
