<div>
    {{-- Selector dinámico de categorías --}}
    @foreach ($categoryLevels as $level => $categories)
    @if ($categories->isNotEmpty())
        <div class="col-span-6 md:col-span-2">
            <x-select-l label="{{ $level === 0 ? 'Categoría:' : 'Subcategoría nivel ' . $level }}"
                for="level_{{ $level }}" wire:model.live="selectedLevels.{{ $level }}">
                <option value="">Ninguna</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </x-select-l>
        </div>
    @endif
@endforeach
</div>
