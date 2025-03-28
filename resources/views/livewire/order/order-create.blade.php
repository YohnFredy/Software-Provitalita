<div class="">
    <h1 class="text-2xl font-bold text-primary sm:mb-4">Datos compra</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 sm:gap-8">
        {{-- Datos del envío --}}
        <div class="lg:col-span-2">
            <div class="sm:bg-white rounded-lg sm:shadow-md sm:border border-neutral-200 sm:p-6 mb-6">
                <h2 class="text-lg font-semibold text-primary mb-4">Datos de entrega</h2>

                {{-- Nombre y Teléfono --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                    <div>
                        <x-input wire:model.blur="name" label="Nombre completo:" type="text" for="name" required
                            autofocus autocomplete="name" placeholder="Nombre de quien recibirá" />
                    </div>

                    <div>
                        <x-input wire:model.blur="phone" label="Teléfono de contacto:" type="tel" for="phone"
                            required placeholder="Ej: +57 300 123 4567" />
                    </div>
                </div>

                {{-- Ubicación --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                    <div>
                        <x-select wire:model.live="selectedCountry" label="País:" for="selectedCountry"
                            placeholder="Seleccione un país..." :options="$countries" required />
                    </div>

                    @if ($selectedCountry)
                        <div>
                            <x-select wire:model.live="selectedDepartment" label="Departamento/Provincia:"
                                for="selectedDepartment" placeholder="Seleccione un departamento..." :options="$departments"
                                required />
                        </div>

                        @if ($selectedDepartment)
                            <div>
                                @if (count($cities) > 0)
                                    <x-select wire:model.live="selectedCity" label="Ciudad:" for="selectedCity"
                                        placeholder="Seleccione una ciudad..." :options="$cities" required />
                                @else
                                    <x-input wire:model="city" id="city" label="Ciudad:" type="text"
                                        for="city" required autocomplete="city" placeholder="Nombre de la ciudad" />
                                @endif
                            </div>
                        @endif
                    @endif
                </div>

                {{-- Dirección --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4">
                    <div>
                        <x-input wire:model="address" label="Dirección:" type="text" for="address" required
                            placeholder="Calle, número, barrio" />
                    </div>

                    <div>
                        <x-input wire:model="additionalAddress" label="Referencia adicional:" type="text"
                            for="nota" placeholder="Edificio, apartamento, indicaciones, etc." />
                    </div>
                </div>

                {{-- Información Envío --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-5 sm:mt-6">
                    <h3 class="font-semibold text-danger mb-2">Información importante sobre el envío</h3>

                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>El costo del envío se pagará contra entrega directamente al repartidor.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Solo necesitas pagar ahora el valor del producto a través de nuestra pasarela
                                segura.</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 flex-shrink-0"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Para cualquier consulta, escríbenos a <span
                                    class="font-medium">info@fornuvi.com</span></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Resumen de la orden --}}
        <div class="lg:col-span-1">
            <div class="sticky top-6">
                <div class="bg-white rounded-lg shadow-md border border-neutral-200 p-3 sm:p-6 mb-6">
                    <h2 class="text-lg font-semibold text-primary mb-4">Resumen de la orden</h2>

                    <ul class="divide-y divide-gray-200">
                        <li class="flex justify-between py-3">
                            <span class="text-gray-700">Productos ({{ $quantity }})</span>
                            <span class="font-medium">${{ number_format($subTotal, 0, ',', '.') }}</span>
                        </li>

                        @if ($discount > 0)
                            <li class="flex justify-between py-3">
                                <span class="text-ink">Descuento</span>
                                <span
                                    class="font-medium text-secondary">-${{ number_format($discount, 0, ',', '.') }}</span>
                            </li>
                        @endif

                        <li class="flex justify-between py-3">
                            <span class="text-gray-700">Envío</span>
                            <span class="font-medium">${{ number_format($shipping_cost, 0, ',', '.') }}</span>
                        </li>

                        

                        <li class="flex justify-between py-4">
                            <span class="font-semibold">Total</span>
                            <span
                                class="font-bold text-lg text-primary">${{ number_format($total, 0, ',', '.') }}</span>
                        </li>

                        <li class="flex justify-end py-3 font-medium text-danger underline">
                            <span class="">Total Puntos: </span>
                            <span class="ml-1"> {{ number_format($total_pts, 2, ',', '.') }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Términos y Botón de compra --}}
                <div class="bg-white rounded-lg shadow-md border border-neutral-200 px-3 py-6 sm:p-6">
                    <div class="flex items-center">
                        <flux:checkbox wire:model="terms" required id="terms" class="mt-1" />
                        <div class="ml-3">
                            @livewire('purchase-policy-and-conditions')
                        </div>
                    </div>

                    @error('terms')
                        <p class="text-sm text-danger mt-1">{{ $message }}</p>
                    @enderror

                    <flux:button variant="primary" wire:click="create_order" class="w-full mt-4">
                        Continuar con la compra
                    </flux:button>
                </div>
            </div>
        </div>
    </div>
</div>
