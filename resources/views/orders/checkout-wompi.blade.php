<x-layouts.app>

    <div class=" space-y-4">
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
                                    <p class="font-medium">Envío a la dirección:</p>
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
            </div>
        </div>

        <!-- Order Summary -->
        <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md border border-neutral-200">
            <h2 class="text-lg font-semibold text-primary uppercase flex items-center gap-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <line x1="2" x2="22" y1="10" y2="10" />
                </svg>
                Resumen de Pedido
            </h2>
            <div class="overflow-x-auto -mx-4 sm:mx-0 rounded-lg border border-neutral-200">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-600">
                    <thead class="text-xs bg-primary text-white uppercase">
                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3">Producto</th>
                            <th scope="col" class="px-2 sm:px-6 py-3 text-center">Cant</th>
                            <th scope="col" class="px-4 sm:px-6 py-3 text-right">Total</th>
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
                                <td class="px-4 sm:px-6 py-3 text-right font-medium">
                                    ${{ number_format($item->price * $item->quantity, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Payment Details -->
            <div class="bg-white rounded-lg p-5 sm:p-6 shadow-md border border-neutral-200">
                <h1 class="text-xl sm:text-2xl font-bold text-primary mb-3">Detalles de Pago</h1>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="text-sm sm:text-base font-semibold text-primary uppercase">Referencia:</span>
                    <span
                        class="text-sm sm:text-base text-secondary font-bold">{{ $order->public_order_number }}</span>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="bg-white rounded-lg p-5 sm:p-6 shadow-md border border-neutral-200">
                <h2 class="text-lg sm:text-xl font-semibold text-primary uppercase mb-4">Métodos de Pago</h2>

                <div class="space-y-5">
                    <!-- Transferencia Bancaria -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-2">Pago por Transferencia
                            Bancaria</h3>
                        <p class="text-neutral-600 text-sm sm:text-base leading-relaxed">
                            La orden ha sido generada exitosamente.

                            Si prefieres realizar el pago mediante transferencia bancaria en lugar de utilizar nuestra
                            pasarela de pagos, puedes hacerlo a través de Bancolombia, Nequi, Daviplata u otros medios
                            disponibles. Para continuar con el proceso, simplemente contáctanos a través de WhatsApp al
                            <strong class="underline whitespace-nowrap">(+57) 314 520-78-14</strong> y te
                            proporcionaremos los detalles necesarios para completar tu pago.
                        </p>
                    </div>

                    <!-- Pasarela de Pago -->
                    <div class="bg-neutral-50 p-4 sm:p-5 rounded-md border border-neutral-300">
                        <h3 class="font-semibold text-primary text-base sm:text-lg mb-2">Pago con Pasarela Wompi</h3>
                        <p class="text-neutral-600 text-sm sm:text-base leading-relaxed">
                            Haga clic en el botón a continuación para proceder con el pago a través de nuestra pasarela
                            segura.
                        </p>
                        <div class="mt-4">
                            <form action="https://checkout.wompi.co/p/" method="GET">
                                <!-- DATOS OBLIGATORIOS -->
                                <input type="hidden" name="public-key"
                                    value="{{ config('services.wompi.public_key') }}" />
                                <input type="hidden" name="currency" value="COP" />
                                <input type="hidden" name="amount-in-cents" value="{{ $order->total * 100 }}" />
                                <input type="hidden" name="reference" value="{{ $order->public_order_number }}" />
                                <input type="hidden" name="signature:integrity" value="{{ $signature }}" />
                                <input type="hidden" name="redirect-url"
                                    value="{{ config('services.wompi.redirect_url') }}" />
                                <input type="hidden" name="expiration-time"
                                    value="{{ $expiration }}" />

                                <!-- DATOS OPCIONALES: IMPUESTOS -->
                                @if (isset($taxes))
                                    <input type="hidden" name="tax-in-cents:vat"
                                        value="{{ $taxes['vat'] ?? 0 }}" />
                                    <input type="hidden" name="tax-in-cents:consumption"
                                        value="{{ $taxes['consumption'] ?? 0 }}" />
                                @endif

                                <!-- DATOS OPCIONALES: CLIENTE -->
                                @if (isset($customer))
                                    <input type="hidden" name="customer-data:email"
                                        value="{{ $customer['email'] }}" />
                                    <input type="hidden" name="customer-data:full-name"
                                        value="{{ $customer['name'] }}" />
                                    <input type="hidden" name="customer-data:phone-number"
                                        value="{{ $customer['phone'] }}" />
                                    <input type="hidden" name="customer-data:legal-id"
                                        value="{{ $customer['id_number'] }}" />
                                    <input type="hidden" name="customer-data:legal-id-type"
                                        value="{{ $customer['id_type'] }}" />
                                @endif

                                <!-- DATOS OPCIONALES: ENVÍO -->
                                @if (isset($shipping))
                                    <input type="hidden" name="shipping-address:address-line-1"
                                        value="{{ $shipping['address'] }}" />
                                    <input type="hidden" name="shipping-address:country"
                                        value="{{ $shipping['country'] }}" />
                                    <input type="hidden" name="shipping-address:city"
                                        value="{{ $shipping['city'] }}" />
                                    <input type="hidden" name="shipping-address:region"
                                        value="{{ $shipping['region'] }}" />
                                    <input type="hidden" name="shipping-address:phone-number"
                                        value="{{ $shipping['phone'] }}" />
                                @endif

                                <!-- BOTÓN DE PAGO -->
                                <flux:button variant="primary" type="submit">
                                    🔒 Pago 100% seguro con Wompi
                                </flux:button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
