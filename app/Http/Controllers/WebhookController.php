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
