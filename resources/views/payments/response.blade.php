<x-layouts.app title="response">
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Estado de tu pago</h2>

        <p>Orden: <strong>{{ $order->public_order_number }}</strong></p>
        <p>Total pagado: <strong>${{ number_format($order->total, 2) }}</strong></p>
        <p>Estado del pago: 
            <strong class="{{ $transaction['status'] === 'APPROVED' ? 'text-green-500' : 'text-red-500' }}">
                {{ $transaction['status'] }}
            </strong>
        </p>

        @if($transaction['status'] === 'APPROVED')
            <p class="text-green-500 font-bold">¡Tu pago ha sido aprobado! 🎉</p>
        @else
            <p class="text-red-500 font-bold">Hubo un problema con tu pago. Por favor, intenta nuevamente.</p>
        @endif

        <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Volver al inicio</a>
    </div>
</x-layouts.app>