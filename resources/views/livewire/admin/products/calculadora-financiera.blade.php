<div>

    <flux:modal.trigger name="financiera">
        <flux:button variant="primary"> Calculadora Financiera de Puntos
        </flux:button>
    </flux:modal.trigger>
    <flux:modal name="financiera" class=" max-w-4xl">

        <div class="space-y-4">
            <div>
                <flux:heading class=" text-ink!" size="lg">Calculadora Financiera de Puntos</flux:heading>
            </div>


            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Parámetros Base</h2>

            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="precioPublico" type="number" step="any" label="Precio Iva:"
                        for="precioPublico" autofocus autocomplete="precioPublico" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="valorProducto" type="number" step="any" label="Costo producto:"
                        for="precioPublico" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="descuentoPrecioPublicoPorcentaje" type="number" step="any"
                        label="Descuento (%):" for="descuentoPrecioPublicoPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="ivaPorcentaje" type="number" step="any" label="IVA (%):"
                        for="ivaPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="empresaPorcentaje" type="number" step="any" label="Empresa %:"
                        for="empresaPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="bonoInicioPorcentaje" type="number" step="any" label="Bono Inicio %:"
                        for="bonoInicioPorcentaje" />
                </div>
            </div>

            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Parámetros Pasarela y Puntos</h2>

            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="tarifaPasarelaPorcentaje" type="number" step="any" label="Tarifa %:"
                        for="tarifaPasarelaPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="tarifaFijaPasarela" type="number" step="any" label="Tarifa Fija"
                        for="tarifaFijaPasarela" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="reteIcaPorcentaje" type="number" step="any" label="ReteICA (%):"
                        for="reteIcaPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="reteRentaPorcentaje" type="number" step="any" label="ReteRenta (%):"
                        for="reteRentaPorcentaje" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="valorDolar" type="number" step="any" label="Valor Dólar:"
                        for="valorDolar" />
                </div>
                <div class="col-span-6 md:col-span-1">
                    <x-input wire:model.blur="binarioPorcentaje" type="number" step="any" label="Pts Binario %:"
                        for="binarioPorcentaje" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1 md:col-span-1">
                    <div class=" bg-secondary/10 rounded-md  p-4">
                        <ul class="list-disc list-inside">
                            <li>Pts_base: {{ number_format($ptsBase, 2) }}</li>
                            <li>Ganancia Empresa: {{ number_format($gananciaEmpresa, 0) }}</li>
                            <li>Repartir:{{ number_format($saldoSinBono, 0) }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class=" bg-secondary/10 rounded-md  p-4">
                        <ul class="list-disc list-inside">
                            <li>Pts_bono: {{ number_format($ptsConBono, 2) }}</li>
                            <li>Ganancia Empresa: {{ number_format($gananciaEmpresa, 0) }}</li>
                            <li><strong>Repartir:</strong> {{ number_format($saldoConBono, 0) }}</li>

                        </ul>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <div class=" bg-secondary/10 rounded-md  p-4">
                        <ul class="list-disc list-inside">
                            <li>Pts_dist: {{ number_format($ptsDistribucion, 2) }}</li>
                            <li>Ganancia Empresa: {{ number_format($gananciaEmpresa, 0) }}</li>
                            <li><strong>Repartir:</strong> {{ number_format($saldoDistribucion, 0) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex">
                <flux:spacer />
                <flux:button type="button" wire:click="agregar" variant="primary"
                    x-on:click="$flux.modal('financiera').close()">Agregar Datos</flux:button>
            </div>
        </div>


    </flux:modal>
</div>
