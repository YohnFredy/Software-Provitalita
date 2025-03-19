<div class="rounded-b-md min-h-screen">
    <!-- Cabecera con título y barra de búsqueda -->
    <div class="bg-gradient-to-r from-primary to-secondary shadow-md py-4 rounded-t-md px-4 md:px-12">
        <!-- Título responsivo -->
        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-3">Productos</h1>
        <!-- Contenedor flexible para controles -->
        <div class="flex flex-col md:space-y-0 md:flex-row md:gap-4">
            <!-- Dropdown de categorías (solo móvil) -->
            <div x-data="{ open: $wire.entangle('showDropdown') }" class="md:hidden relative mb-2">
                <flux:button x-on:click="open = true" class="w-full">Categorías</flux:button>

                <div x-show="open" x-on:click.outside="open = false"
                    class="absolute mt-2 left-0 w-64 p-4 z-50 bg-white border border-gray-300 rounded-lg shadow-lg">
                    @livewire('product.category-listing')
                </div>
            </div>

            <!-- Barra de búsqueda (ancho completo en móvil) -->
            <div class="w-full md:w-80">
                <flux:input wire:model.live.debounce.300ms="search" kbd="⌘K" icon="magnifying-glass"
                    placeholder="Buscar productos..." class="w-full" />
            </div>

            <!-- Botón de limpiar filtros -->
            <div class=" hidden md:block">
                @if ($filter === true)
                    <div class="flex justify-center md:justify-start md:block mt-2  md:mt-0">
                        <flux:button wire:click="clearFilters" class="w-full md:w-auto">Limpiar filtros</flux:button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- filtros movil  --}}
    <div class="mt-4 md:hidden ">
        <div class="grid grid-cols-2 gap-2 mb-2">
            <div>
                <flux:modal.trigger name="filters">
                    <flux:button icon-trailing="chevron-down" class="w-full sm:w-auto">Filtrar</flux:button>
                </flux:modal.trigger>
            </div>

            <!-- Selector de ordenamiento -->
            <div class="relative w-full">
                <select wire:model.live="sortBy"
                    class="block w-full bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                    <option selected>Ordenar por</option>
                    <option value="newest">Más recientes</option>
                    <option value="price_asc">Precio: menor a mayor</option>
                    <option value="price_desc">Precio: mayor a menor</option>
                    <option value="name_asc">Nombre: A-Z</option>
                    <option value="name_desc">Nombre: Z-A</option>
                </select>
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class=" col-span-2">
                @if ($filter === true)
                    <div class="flex justify-center md:justify-start md:block">
                        <flux:button wire:click="clearFilters" class="w-full md:w-auto">Limpiar filtros</flux:button>
                    </div>
                @endif
            </div>
        </div>

        <flux:modal name="filters" variant="flyout" class="w-80">
            <div class="divide-y divide-neutral-300 {{-- sticky --}} ">
                <!-- Filtro de marcas -->
                <div class="pb-4">
                    <flux:radio.group wire:model.live="selectedBrand" label="Marcas">
                        @foreach ($brands as $brand)
                            <flux:radio value="{{ $brand->id }}" label="{{ $brand->name }}" />
                        @endforeach
                    </flux:radio.group>
                </div>

                <!-- Filtro de precio -->
                <div class="py-4">
                    <flux:label>Precio</flux:label>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <flux:input wire:model.live.debounce.500ms="priceMin" type="number" size="sm"
                            label="Mínimo" min="0" />
                        <flux:input wire:model.live.debounce.500ms="priceMax" type="number" size="sm"
                            label="Máximo" min="0" />
                    </div>
                </div>

                <!-- Filtro de disponibilidad -->
                <div class="py-4">
                    <flux:radio.group wire:model.live="inStock" label="Disponibilidad">
                        <flux:radio value="1" label="En stock" />
                        <flux:radio value="0" label="Agotado" />
                        <flux:radio value="all" label="Todos" checked />
                    </flux:radio.group>
                </div>

                <!-- Filtro de tipo de producto-->
                <div class="py-4">
                    <flux:radio.group wire:model.live="isPhysical" label="Tipo de producto">
                        <flux:radio value="1" label="Producto físico" />
                        <flux:radio value="0" label="Producto digital" />
                        <flux:radio value="all" label="Todos" checked />
                    </flux:radio.group>
                </div>

                <div class=" pt-4 flex space-x-2 justify-end">
                    @if ($filter === true)
                        <flux:button wire:click="clearFilters">Limpiar filtros</flux:button>
                    @endif
                    <flux:button x-on:click="$flux.modal('filters').close()">
                        Cerrar
                    </flux:button>
                </div>
            </div>
        </flux:modal>
    </div>

    <!-- Contenido principal -->
    <div class=" mx-auto sm:px-4 md:pt-8">
        <div class="flex flex-col lg:flex-row gap-x-8">
            <!-- Sidebar con filtros -->
            <div class="lg:w-1/4  hidden md:block">
                <div
                    class="bg-white rounded-lg shadow-md shadow-ink border border-neutral-300 px-6 py-2 divide-y divide-neutral-400 {{-- sticky --}} ">
                    <!-- navegación de categorías -->
                    <div class="py-4 ">
                        @livewire('product.category-listing')
                    </div>
                    <!-- Filtro de marcas -->
                    <div class="py-4">
                        <flux:radio.group wire:model.live="selectedBrand" label="Marcas">
                            @foreach ($brands as $brand)
                                <flux:radio value="{{ $brand->id }}" label="{{ $brand->name }}" />
                            @endforeach
                        </flux:radio.group>
                    </div>

                    <!-- Filtro de precio -->
                    <div class="py-4">
                        <flux:label>Precio</flux:label>
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <flux:input wire:model.live.debounce.500ms="priceMin" type="number" size="sm"
                                label="Mínimo" min="0" />
                            <flux:input wire:model.live.debounce.500ms="priceMax" type="number" size="sm"
                                label="Máximo" min="0" />
                        </div>
                    </div>

                    <!-- Filtro de disponibilidad -->
                    <div class="py-4">
                        <flux:radio.group wire:model.live="inStock" label="Disponibilidad">
                            <flux:radio value="1" label="En stock" />
                            <flux:radio value="0" label="Agotado" />
                            <flux:radio value="all" label="Todos" checked />
                        </flux:radio.group>
                    </div>

                    <!-- Filtro de tipo de producto-->
                    <div class="py-4">
                        <flux:radio.group wire:model.live="isPhysical" label="Tipo de producto">
                            <flux:radio value="1" label="Producto físico" />
                            <flux:radio value="0" label="Producto digital" />
                            <flux:radio value="all" label="Todos" checked />
                        </flux:radio.group>
                    </div>
                </div>
            </div>

            <!-- Rejilla de productos -->
            <div class="lg:w-3/4">
                <!-- Barra de control superior -->
                <div class="hidden md:block">
                    <div
                        class=" bg-white mb-6 flex flex-col sm:flex-row justify-between items-center">
                        <div class="mb-4 sm:mb-0">
                            <span class="text-primary">Mostrando {{ $products->count() }} de {{ $products->total() }}
                                productos</span>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="relative">
                                <select wire:model.live="sortBy"
                                    class="block  w-44 bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                                    <option selected>Ordenar por</option>
                                    <option value="newest">Más recientes</option>
                                    <option value="price_asc">Precio: menor a mayor</option>
                                    <option value="price_desc">Precio: mayor a menor</option>
                                    <option value="name_asc">Nombre: A-Z</option>
                                    <option value="name_desc">Nombre: Z-A</option>
                                </select>
                                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>



                            <div class="relative">
                                <select wire:model.live="perPage"
                                    class="block w-44 bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                                    <option selected>Ordenar por pagina</option>
                                    <option value="12">12 por página</option>
                                    <option value="24">24 por página</option>
                                    <option value="36">36 por página</option>
                                    <option value="48">48 por página</option>
                                </select>
                                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido de productos -->
                @if ($products->count() == 0)
                    <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                        <h3 class="text-xl font-bold text-gray-700 mb-2">No se encontraron productos</h3>
                        <p class="text-gray-600 mb-4">Intenta con otros filtros o términos de búsqueda.</p>
                        <flux:button wire:click="clearFilters">Limpiar filtros</flux:button>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($products as $product)
                            <div wire:key="{{ $product->id }}"
                                class="bg-white rounded-xl shadow-md shadow-ink/50 border border-neutral-100 overflow-hidden group">
                                <!-- Contenedor de imagen con efecto de zoom y bordes suaves -->
                                <div
                                    class="h-56 bg-white relative overflow-hidden flex items-center justify-center p-4">
                                    <!-- Efecto de overlay en hover -->
                                    <div
                                        class="absolute inset-0  group-hover:bg-neutral-100/1 transition-all duration-300 z-10">
                                    </div>

                                    @if ($product->latestImage)
                                        <img src="{{ asset('storage/' . $product->latestImage->path) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-contain transition duration-500 group-hover:scale-110">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Default Image"
                                            class="w-full h-full object-contain transition duration-500 group-hover:scale-110">
                                    @endif

                                    <!-- Etiquetas con diseño mejorado -->
                                    <div class="absolute top-3 right-3 flex flex-col gap-2 z-20">
                                        @if ($product->stock == 0 && !$product->allow_backorder)
                                            <div
                                                class="bg-danger text-white px-3 py-1 rounded-md text-xs font-medium shadow-sm">
                                                Agotado
                                            </div>
                                        @endif
                                    </div>

                                    <div class="absolute top-3 left-3 z-20">
                                        @if (!$product->is_physical)
                                            <div
                                                class="bg-primary text-white px-3 py-1 rounded-md text-xs font-medium shadow-sm">
                                                Digital
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Barra separadora sutil -->
                                <div class="h-px bg-gradient-to-r from-transparent via-neutral-600 to-transparent"></div>

                                <!-- Contenido del producto con espaciado mejorado -->
                                <div class="p-5 bg-neutral-100">
                                    <!-- Marca y precio -->
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            @if ($product->brand)
                                                <span
                                                    class="text-xs text-primary font-semibold tracking-wide uppercase">
                                                    {{ $product->brand->name }}
                                                </span>
                                            @endif
                                            <h3
                                                class="font-bold text-primary text-lg group-hover:text-primary transition-colors">
                                                <a href="{{-- {{ route('products.show', $product->slug) }} --}}">{{ $product->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="ml-2">
                                            <span
                                                class="font-bold text-secondary text-lg">${{ number_format($product->price, 2) }}</span>
                                        </div>
                                    </div>

                                    <!-- Descripción con mejor formato -->
                                    <p class="text-ink text-sm mb-4 line-clamp-2 leading-relaxed">
                                        {{ $product->description }}</p>

                                    <!-- Categoría y botón mejorados -->
                                    <div class="flex justify-between items-center mt-4">
                                        @if ($product->category)
                                            <span
                                                class="text-xs bg-premium/5 text-premium px-3 py-1.5 rounded-lg font-medium mr-2">
                                                Pts: {{ $product->pts }}
                                            </span>
                                        @endif

                                        <a href="{{ route('products.show', $product) }}">
                                            <flux:button type="button" icon="shopping-cart" variant="primary">
                                                Detalle
                                            </flux:button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
