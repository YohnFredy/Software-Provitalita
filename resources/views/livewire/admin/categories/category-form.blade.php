<div>
    <div class="mb-4">
        <h3 class="text-lg font-medium text-danger leading-6">Información de la Categoría</h3>
        <p class="mt-1 text-sm text-ink">Complete la información necesaria para esta categoría.</p>
    </div>

    <div class=" grid grid-cols-3">
        <div class=" col-span-3 md:col-span-1">
            <x-input type="text" label="Nombre de la Categoría:" for="name" name="name" id="name"
                value="{{ old('name', $name) }}" autofocus autocomplete="name"
                placeholder="Ingrese el nombre de la categoría" />
        </div>
    </div>
    {{-- Selector dinámico de categorías --}}

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-6">
        @foreach ($categoryLevels as $level => $categories)
            @if ($categories->isNotEmpty())
                <div class="sm:col-span-2">
                    <x-select-l label="{{ $level === 0 ? 'Categoría:' : 'Subcategoría nivel ' . $level }}"
                        for="level_{{ $level }}" wire:model.live="selectedLevels.{{ $level }}">
                        <option value="">Ninguno</option>

                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </x-select-l>
                </div>
            @endif
        @endforeach
    </div>

    <input type="hidden" name="parent_id" value="{{ $parent_id }}" />
    @error('parent_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror


    <div class="bg-neutral-50 border border-neutral-300 px-4 py-5 sm:rounded-lg mt-6">
        <h3 class="text-lg font-medium text-primary leading-6 mb-4">Configuración Adicional</h3>
        <div class="space-y-8">
            <div class="flex items-start">
                <div class="flex items-center">
                    <input type="checkbox" name="is_final" id="is_final"
                        {{ old('is_final', $is_final) ? 'checked' : '' }} class="h-4 w-4 ">
                    <div class="ml-3 text-sm">
                        <label for="is_final" class="font-medium text-primary">Categoría Final</label>
                        <p class="text-ink">Si está marcada, esta categoría no podrá tener subcategorías.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input type="checkbox" name="is_active" id="is_active"
                        {{ old('is_active', $is_active) ? 'checked' : '' }} class="h-4 w-4">
                    <div class="ml-3 text-sm">
                        <label for="is_active" class="font-medium text-primary">Activa</label>
                        <p class="text-ink">Desmarque esta opción para ocultar temporalmente la categoría.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
