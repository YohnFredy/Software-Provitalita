<x-layouts.app title="response">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg shadow-ink">
            <h1 class="text-2xl font-bold  mb-4">{{ $message }}</h1>
            <p class=" mb-4">Estado de la transacción: <strong>{{ $status }}</strong></p>
            <p class="">Identificador de la orden: <strong>{{ $orderId }}</strong></p>
            <div class="mt-6">
                @if ($status === 'approved')
                    <a href="" class="bg-primary text-white  px-4 py-2 rounded hover:bg-secondary">Ver mis
                        pedidos</a>
                @else
                    <a href="" class="bg-primary text-white px-4 py-2 rounded hover:bg-secondary">Volver a la
                        tienda</a>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
