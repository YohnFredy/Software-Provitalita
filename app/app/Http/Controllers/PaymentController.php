<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function wompiResponse(Request $request)
    {
        // Obtener el ID de la transacción desde la URL
        $transactionId = $request->query('id');

        if (!$transactionId) {
            return redirect()->route('home')->with('error', 'ID de transacción no válido.');
        }

        // Registrar el ID de la transacción en los logs para depuración
        Log::info('ID de la transacción recibido:', ['transactionId' => $transactionId]);

        // Consultar el estado de la transacción en la API de Wompi
        $response = Http::get("https://production.wompi.co/v1/transactions/{$transactionId}");

        // Validar si la petición fue exitosa
        if ($response->failed()) {
            Log::error('Error al consultar la API de Wompi:', ['transactionId' => $transactionId]);
            return redirect()->route('home')->with('error', 'No se pudo obtener el estado de la transacción.');
        }

        // Obtener el JSON de la respuesta
        $transactionData = $response->json();
        Log::info('Respuesta de Wompi:', $transactionData);

        // Verificar que la respuesta contenga el campo 'data'
        if (!isset($transactionData['data'])) {
            Log::error('La respuesta de Wompi no contiene el campo "data".');
            return redirect()->route('home')->with('error', 'Respuesta de Wompi no válida.');
        }

        $transaction = $transactionData['data'];

        // Verificar que la transacción tenga una referencia válida
        if (!isset($transaction['reference'])) {
            Log::error('La transacción no contiene el campo "reference".', ['transaction' => $transaction]);
            return redirect()->route('home')->with('error', 'Referencia de transacción no encontrada.');
        }

        // Buscar la orden en la base de datos con el public_order_number
        $order = Order::where('public_order_number', $transaction['reference'])->first();

        if (!$order) {
            Log::error('No se encontró la orden con la referencia proporcionada por Wompi.', ['reference' => $transaction['reference']]);
            return redirect()->route('home')->with('error', 'Orden no encontrada.');
        }

        // Registrar en logs el estado recibido de la transacción
        Log::info('Estado de la transacción en Wompi:', ['status' => $transaction['status']]);


        Log::info('Orden actualizada correctamente.', ['order_id' => $order->id, 'new_status' => $order->status]);

        // Retornar la vista con los datos de la orden y la transacción
        return view('payments.response', compact('order', 'transaction'));
    }

    public function boldResponse(Request $request)
    {
        $orderId = $request->input('bold-order-id');
        $status = $request->input('bold-tx-status');

        // Aquí puedes manejar la lógica según el estado de la transacción
        switch ($status) {
            case 'approved':
                $message = '¡Gracias por tu compra! Tu transacción ha sido aprobada.';
                // Puedes agregar más lógica, como enviar un correo de confirmación o actualizar el estado de la orden en la base de datos
                break;

            case 'processing':
                $message = 'Tu transacción está en proceso. Te notificaremos cuando se complete.';
                break;

            case 'pending':
                $message = 'Tu transacción está pendiente. Te notificaremos cuando se confirme.';
                break;

            case 'rejected':
                $message = 'Lo sentimos, tu transacción ha sido rechazada. Por favor, intenta nuevamente.';
                break;

            case 'failed':
                $message = 'Hubo un error en tu transacción. Por favor, intenta nuevamente.';
                break;

            default:
                $message = 'Estado de la transacción desconocido. Por favor, contacta con soporte.';
                break;
        }

        return view('payments.response-bold', compact('orderId', 'status', 'message'));
    } 
}
