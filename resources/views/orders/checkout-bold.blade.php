<x-layouts.app>
    <div class=" space-y-4 ">
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <h1 class="text-xl sm:text-2xl font-bold text-primary mb-2">Detalles de Pago</h1>
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm sm:text-base font-semibold text-primary uppercase">Referencia:</span>
                <span class="text-sm sm:text-base text-secondary font-bold">{{ $order->public_order_number }}</span>
            </div>
        </div>

        <!-- Shipping and Contact Details -->
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Shipping Details -->
                <div class="space-y-3">
                    <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="16" height="13" x="4" y="7" rx="2" />
                            <path d="M18 7V5a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v2" />
                            <path d="M8 12h8" />
                            <path d="M8 16h8" />
                        </svg>
                        Detalles de Envío
                    </h2>
                    <div class="bg-neutral-50 p-3 rounded-md text-sm sm:text-base">
                        @if ($order->envio_type == 1)
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mt-0.5 flex-shrink-0 text-primary" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 3v18h18" />
                                    <path d="M7 14v3" />
                                    <path d="M11 9v8" />
                                    <path d="M15 14v3" />
                                    <path d="M19 15v2" />
                                </svg>
                                <div>
                                    <p class="font-medium">Recogida en tienda:</p>
                                    <p class="text-neutral-600">Calle 15 #42, Cali, Valle del Cauca</p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mt-0.5 flex-shrink-0 text-primary" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <div>
                                    <p class="font-medium">Dirección:</p>
                                    <p class="text-neutral-600">{{ $order->address }} - {{ $order->additional_address }}
                                    </p>
                                    <p class="text-neutral-600">{{ $order->country->name }} -
                                        {{ $order->department->name }} -
                                        @if (!$order->city_id == null)
                                            {{ $order->city->name }}
                                        @else
                                            {{ $order->addCity }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="space-y-3">
                    <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Contacto
                    </h2>
                    <div class="bg-neutral-50 p-3 rounded-md text-sm sm:text-base">
                        <div class="flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            <span class="font-medium">Recibe:</span>
                            <span class="text-neutral-600">{{ $order->contact }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span class="font-medium">Teléfono:</span>
                            <span class="text-neutral-600">{{ $order->phone }}</span>
                        </div>
                    </div>
                </div>

                {{-- Información Envío --}}
                <div class="bg-secondary/5 border border-secondary/30 rounded-lg p-3 sm:p-5">
                    <h3 class=" text-xl font-semibold text-danger mb-2">Información importante sobre el envío</h3>

                    <ul class="space-y-2 text-base text-gray-700">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>El costo del envío se pagará contra entrega directamente al repartidor.</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Solo necesitas pagar ahora el valor del producto a través de nuestra pasarela
                                segura.</span>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Para cualquier consulta, escríbenos a <pan class="font-medium">infopan></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="sm:bg-white sm:rounded-lg pt-8  sm:p-6 sm:shadow-md sm:border sm:border-neutral-200">
            <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <line x1="2" x2="22" y1="10" y2="10" />
                </svg>
                Resumen de Pedido
            </h2>
            <div class="overflow-x-auto  sm:mx-0 rounded-lg border border-neutral-200">
                <table class="w-full  text-sm text-left rtl:text-right text-neutral-600">
                    <thead class="text-xs bg-primary text-white uppercase">

                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3">Producto</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Cant</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Precio unitario.</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Pts unitario</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Descuento</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Iva</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">%</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Precio unitario venta</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($order->items as $item)
                            <tr class="border-b border-neutral-200 hover:bg-neutral-50">
                                <th scope="row"
                                    class="flex items-center px-4 sm:px-6 py-3 font-medium text-neutral-900 whitespace-nowrap">
                                    @if ($item->product->latestImage)
                                        <img src="{{ asset('storage/' . $item->product->latestImage->path) }}"
                                            alt="{{ $item->product->name }}"
                                            class="w-10 h-10 rounded-md object-cover">
                                    @else
                                        <img src="{{ asset('images/default.png') }}"
                                            alt="{{ $item->product->name }}"
                                            class="w-10 h-10 rounded-md object-cover">
                                    @endif
                                    <div class="ps-3 max-w-[180px] sm:max-w-none">
                                        <div class="text-xs sm:text-sm font-semibold truncate">{{ $item->name }}
                                        </div>
                                    </div>
                                </th>
                                <td class="px-2 sm:px-6 py-3 text-center">{{ $item->quantity }}</td>
                                <td class="px-2 sm:px-6 py-3 text-center">${{ formatear_precio($item->unit_price) }}
                                </td>
                                <td class="px-2 sm:px-6 py-3 text-center">{{ formatear_precio($item->pts) }}</td>
                                <td class="px-2 sm:px-6 py-3 text-center">${{ formatear_precio($item->discount) }}
                                </td>
                                <td class="px-2 sm:px-6 py-3 text-center">${{ formatear_precio($item->tax_amount) }}
                                </td>

                                <td class="px-2 sm:px-6 py-3 text-center">{{ formatear_precio($item->tax_percent) }}
                                </td>
                                <td class="px-2 sm:px-6 py-3 text-center">
                                    ${{ formatear_precio($item->unit_sales_price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class=" sm:flex justify-end">
                <div class="mt-4 sm:w-1/2">

                    <!-- Order Summary Card -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                        <!-- Order Details -->
                        <div class="px-2 sm:px-6 py-1">
                            <ul class="space-y-1">
                                <!-- Subtotal -->
                                <li class="flex justify-between items-center py-1">
                                    <span class="text-sm text-gray-600">Subtotal</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        ${{ formatear_precio($order->subtotal) }}
                                    </span>
                                </li>

                                <!-- Descuento -->
                                @if ($order->discount > 0)
                                    <li class="flex justify-between items-center py-1">
                                        <span class="text-sm text-gray-600">Descuento</span>
                                        <span class="text-sm font-medium text-premium">
                                            -${{ formatear_precio($order->discount) }}
                                        </span>
                                    </li>
                                @endif


                                <!-- Total Bruto -->
                                <li class="flex justify-between items-center py-1 border-t border-gray-100 pt-3">
                                    <span class="text-sm font-medium text-gray-700">Total Bruto</span>
                                    <span class="text-sm font-semibold text-gray-900">
                                        ${{ formatear_precio($order->subtotal - $order->discount) }}
                                    </span>
                                </li>

                                <!-- Impuestos -->
                                @if ($order->tax_amount > 0)
                                    <li class="bg-gray-50 -mx-6 px-6 py-1">
                                        <div class="space-y-2">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">IVA</span>
                                                <span class="text-sm text-gray-700">
                                                    ${{ formatear_precio($order->tax_amount) }}
                                                </span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Otros impuestos</span>
                                                <span class="text-sm text-gray-700">$0</span>
                                            </div>
                                            <div
                                                class="flex justify-between items-center pt-2 border-t border-gray-200">
                                                <span class="text-sm font-medium text-gray-700">Total impuestos</span>
                                                <span class="text-sm font-semibold text-gray-900">
                                                    ${{ formatear_precio($order->tax_amount) }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Total Final -->
                        <div class="bg-primary/5 border-t border-primary/20 px-2 sm:px-6 py-2">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-900">Total a pagar</span>
                                <span class="font-bold text-primary">
                                    ${{ formatear_precio($order->total) }}
                                </span>
                            </div>

                            @if (isset($order->total_pts) && $order->total_pts > 0)
                                <div class="mt-2 text-center">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-premium/5 text-premium">
                                        ⭐ Ganarás {{ formatear_precio($order->total_pts) }} puntos
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 border-t-2 pt-8 sm:border-t-0 sm:pt-0">
            <!-- Métodos de Pago -->
            <div class="sm:bg-white rounded-lg sm:p-6 sm:shadow-md sm:border sm:border-neutral-200">
                <h2 class="text-lg sm:text-xl font-semibold text-primary uppercase mb-4">Métodos de Pago</h2>

                <div class="space-y-6">
                    <!-- Transferencia Bancaria o Nequi -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-3">Pago por Transferencia
                            Bancaria o Nequi</h3>

                        <div class="text-neutral-700 sm:text-base leading-relaxed space-y-3">
                            <p>Tu orden ha sido generada exitosamente.</p>

                            <p><strong>Opciones de pago disponibles:</strong></p>
                            <ul class="list-disc space-y-1 ml-10 text-primary">
                                <li>Pasarela de pagos (ver más abajo).</li>
                                <li>Transferencia bancaria directa o Nequi.</li>
                            </ul>

                            <p>Si prefieres realizar una transferencia, puedes hacerlo a cualquiera de las siguientes
                                opciones:</p>

                            <!-- Información Bancolombia -->
                            <div class="bg-white border border-primary rounded-md p-4 text-sm sm:text-base space-y-2">
                                <p>
                                    <i class="fas fa-university text-primary mr-2"></i>
                                    <strong>Entidad:</strong> Bancolombia
                                </p>
                                <p>
                                    <i class="fas fa-wallet text-primary mr-2"></i>
                                    <strong>Tipo de cuenta:</strong> Ahorros
                                </p>
                                <p>
                                    <i class="fas fa-hashtag text-primary mr-2"></i>
                                    <strong>Número de cuenta:</strong>
                                    <span class="font-mono">912010716-29</span>
                                </p>
                                <p>
                                    <i class="fas fa-user-tie text-primary mr-2"></i>
                                    <strong>Titular:</strong> Nohelia Tobar
                                </p>
                                {{-- <p>
                                    <i class="fas fa-id-card text-primary mr-2"></i>
                                    <strong>Cédula:</strong>
                                </p> --}}
                            </div>

                            <!-- Información Nequi -->
                            <div class="bg-white border border-primary rounded-md p-4 text-sm sm:text-base space-y-2">
                                <p>
                                    <i class="fas fa-mobile-alt text-primary mr-2"></i>
                                    <strong>Nequi:</strong>
                                    <span class="font-mono">3188132381</span>
                                </p>
                                <p>
                                    <i class="fas fa-user-tie text-primary mr-2"></i>
                                    <strong>Titular:</strong> Oscar Eduardo rojas
                                </p>
                                {{-- <p>
                                    <i class="fas fa-id-card text-primary mr-2"></i>
                                    <strong>Cédula:</strong> 
                                </p> --}}
                            </div>

                            <p class="pt-2">
                                Una vez realices el pago, por favor envía el comprobante o pantallazo al siguiente
                                número de WhatsApp:
                                <strong class="underline text-primary">(+57) 318 813 2381</strong>. Estaremos atentos
                                para validar y procesar tu pedido.
                            </p>
                            <p>
                                Para mayor información o asistencia, puedes comunicarte con nosotros a través de
                                WhatsApp:
                                <strong class="underline text-primary">(+57) 318 813 2381</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- Pasarela de Pago -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-3">Pago con Pasarela Bold</h3>
                        <p class="text-neutral-700 sm:text-base leading-relaxed">
                            También puedes realizar tu pago de forma segura en línea a través de nuestra pasarela de
                            pagos.
                        </p>
                        <div class="mt-4">
                            {{-- <x-button-dynamic id="custom-button-payment">
                🔒 Pago 100% seguro con Bold
            </x-button-dynamic> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const initBoldCheckout = () => {
                if (document.querySelector(
                        'script[src="https://checkout.bold.co/library/boldPaymentButton.js"]')) {
                    console.warn('Bold Checkout script is already loaded.');
                    return;
                }

                const js = document.createElement('script');
                js.src = 'https://checkout.bold.co/library/boldPaymentButton.js';
                js.onload = () => {
                    window.dispatchEvent(new Event('boldCheckoutLoaded'));
                };
                js.onerror = () => {
                    console.error("Error al cargar el script de Bold.");
                };
                document.head.appendChild(js);
            };

            // Inicializar Bold Checkout al cargar la página
            initBoldCheckout();

            // Esperar a que Bold se cargue
            window.addEventListener('boldCheckoutLoaded', function() {
                console.log("Bold Checkout cargado correctamente.");

                const checkout = new BoldCheckout({
                    orderId: "{{ $boldCheckoutConfig['orderId'] }}",
                    currency: "{{ $boldCheckoutConfig['currency'] }}",
                    amount: "{{ $boldCheckoutConfig['amount'] }}",
                    apiKey: "{{ $boldCheckoutConfig['apiKey'] }}",
                    integritySignature: "{{ $boldCheckoutConfig['integritySignature'] }}",
                    description: "{{ $boldCheckoutConfig['description'] }}",
                    redirectionUrl: "{{ $boldCheckoutConfig['redirectionUrl'] }}",
                    expirationDate: "{{ $boldCheckoutConfig['expiration-date'] }}",
                    dataTax: "{{ $boldCheckoutConfig['tax'] }}",
                    /* dataTax: {!! $boldCheckoutConfig['tax'] !!}, */
                });

                const customButton = document.getElementById('custom-button-payment');
                if (customButton) {
                    customButton.addEventListener('click', function() {
                        checkout.open();
                    });
                }
            });
        });
    </script>



    {{--  <script>
        // Pasar la configuración del checkout al objeto window
        window.boldCheckoutConfig = @json($boldCheckoutConfig);
    </script>

    <!-- Incluir el archivo JavaScript separado -->
    <script src="{{ asset('js/boldCheckout.js') }}"></script> --}}

</x-layouts.app>
