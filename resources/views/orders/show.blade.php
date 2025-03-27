<x-layouts.app title="Show">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div
            class="flex flex-col sm:flex-row items-center bg-white rounded-lg py-4 sm:py-8 px-6 sm:px-12 border border-neutral-200 shadow-md mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
            <!-- Paso 1: Recibido -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="{{ $order->status >= 2 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="text-sm mt-2">Recibido</p>
            </div>

            <!-- Línea de progreso -->
            <div
                class="w-full sm:w-auto sm:flex-1 h-1 {{ $order->status >= 2 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300' }}">
            </div>

            <!-- Paso 2: Enviado -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="{{ $order->status >= 4 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <p class="text-sm mt-2">Enviado</p>
            </div>

            <!-- Línea de progreso -->
            <div
                class="w-full sm:w-auto sm:flex-1 h-1 {{ $order->status >= 4 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300' }}">
            </div>

            <!-- Paso 3: Entregado -->
            <div class="flex flex-col items-center relative sm:flex-1">
                <div
                    class="{{ $order->status >= 5 && $order->status < 6 ? 'bg-primary' : 'bg-neutral-300' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <p class="text-sm mt-2">Entregado</p>
            </div>
        </div>


        <!-- Order Reference -->
        <div class="bg-white rounded-lg p-6 border border-neutral-200 shadow-md mb-6 text-center">
            <p class="text-lg font-semibold text-primary uppercase">Referencia:
                <span>{{ $order->public_order_number }}</span>
            </p>
        </div>

        <!-- Shipping and Contact Details -->
        <div class="bg-white rounded-lg p-6 border border-neutral-200 shadow-md mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Shipping Details -->
                <div>
                    <p class="text-lg font-semibold  uppercase mb-4">Detalles de Envío</p>
                    @if ($order->envio_type == 1)
                        <p class="">Recogida en tienda:</p>
                        <p class="">Calle 15 #42, Cali, Valle del Cauca</p>
                    @else
                        <p class="">Envío a la dirección:</p>
                    @endif
                </div>

                <!-- Contact Details -->
                <div>
                    <p class="text-lg font-semibold text-primary uppercase mb-4">Contacto</p>
                    <p class="">Recibe: {{ $order->contact }}</p>
                    <p class="">Teléfono: {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="sm:bg-white rounded-lg sm:p-6 sm border border-neutral-200 shadow-md mb-6">
            <p class="text-lg font-semibold text-primary uppercase mb-4">Resumen de Pedido</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-neutral-500">
                    <thead class="text-xs bg-primary text-white uppercase">
                        <tr>
                            <th class="px-4 py-3">Producto</th>
                            <th class="px-4 py-3">Cant</th>
                            <th class="px-4 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b border-neutral-300 hover:bg-neutral-50">
                                <td class="flex items-center px-4 py-3 text-primary">
                                    <img src="{{ asset($item->product->latestImage ? 'storage/' . $item->product->latestImage->path : 'images/default.png') }}"
                                        class="w-10 h-10 rounded-md mr-3">
                                    <div class="text-base font-semibold">{{ $item->name }}</div>
                                </td>
                                <td class="px-4 py-3 text-center">{{ $item->quantity }}</td>
                                <td class="px-4 py-3 font-semibold">
                                    ${{ number_format($item->price * $item->quantity, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="sm:bg-white rounded-lg sm:p-6 sm border border-neutral-200 shadow-md text-center">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <img src="https://www.agenciatravelfest.com/wp-content/uploads/2022/10/logos-medios-de-pago.jpg"
                    class="h-24 object-cover rounded-md" alt="Métodos de Pago">
                <div class="text-right mt-4 md:mt-0">
                    <p>Subtotal: ${{ number_format($order->total - $order->shipping_cost, 0) }}</p>
                    <p class="text-lg font-semibold">Total: ${{ number_format($order->total, 0) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir el archivo JavaScript separado -->
    <script src="{{ asset('js/boldCheckout.js') }}"></script>

</x-layouts.app>
