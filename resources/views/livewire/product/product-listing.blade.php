<div class="bg-zinc-100 rounded-b-md min-h-screen">
    <!-- Cabecera con título y barra de búsqueda -->
    <div class="bg-gradient-to-r from-zinc-500 to-zinc-700 py-6 rounded-t-md px-6 md:px-12">
        <h1 class="text-3xl font-bold text-white mb-4">Productos Naturales</h1>
        <div class="flex flex-col md:flex-row gap-4">

            <div class=" flex space-x-2">
                <div x-data="{ open: $wire.entangle('showDropdown') }" class="md:hidden relative">
                    <flux:button x-on:click="open = true">Categorías</flux:button>

                    <div x-show="open" x-on:click.outside="open = false"
                        class="absolute mt-2  w-80 p-4 z-50 bg-white border border-gray-300 rounded-lg shadow-lg">
                        @livewire('product.category-listing')
                    </div>
                </div>

                <div class="w-full md:w-80">
                    <flux:input wire:model.live.debounce.300ms="search" kbd="⌘K" icon="magnifying-glass"
                        placeholder="Buscar productos..." />
                </div>
                @if ($filter === true)
                    <div class="hidden md:block">
                        <flux:button wire:click="clearFilters">Limpiar filtros</flux:button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- filtros movil  --}}
    <div class="p-4 md:hidden ">
        <div class=" flex items-center justify-end space-x-2">

            @if ($filter === true)
                <a class=" text-sm cursor-pointer mx-auto" wire:click="clearFilters">limpiar filtros</a>
            @endif

            <div class="relative">
                <select wire:model.live="sortBy"
                    class="block w-48 appearance-none bg-white border border-gray-300 text-gray-700 py-2 pl-3 pr-10 rounded-md shadow-sm focus:outline-none focus:ring-zinc-500 focus:border-zincs-500 cursor-pointer">
                    <option selected>Ordenar por</option>
                    <option value="newest">Más recientes</option>
                    <option value="price_asc">Precio: menor a mayor</option>
                    <option value="price_desc">Precio: mayor a menor</option>
                    <option value="name_asc">Nombre: A-Z</option>
                    <option value="name_desc">Nombre: Z-A</option>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <flux:modal.trigger name="filters">
                <flux:button icon-trailing="chevron-down" class="cursor-pointer">Filtrar</flux:button>
            </flux:modal.trigger>

            <flux:modal name="filters" variant="flyout" class="w-80">

                <div class="divide-y divide-zinc-300 {{-- sticky --}} ">

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
    </div>

    <!-- Contenido principal -->
    <div class="container mx-auto px-4 md:py-8 pb-8 ">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar con filtros -->
            <div class="lg:w-1/4  hidden md:block">
                <div class="bg-white rounded-lg shadow-lg px-6 py-2 divide-y divide-zinc-300 {{-- sticky --}} ">
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
                <div class=" hidden md:block">
                    <div
                        class=" bg-white rounded-lg shadow p-4 mb-6 flex flex-col sm:flex-row justify-between items-center">
                        <div class="mb-4 sm:mb-0">
                            <span class="text-gray-600">Mostrando {{ $products->count() }} de {{ $products->total() }}
                                productos</span>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="relative">
                                <select wire:model.live="sortBy"
                                    class="block w-full appearance-none bg-white border border-gray-300 text-gray-700 py-2 pl-3 pr-10 rounded-md shadow-sm focus:outline-none focus:ring-zinc-500 focus:border-zincs-500">
                                    <option selected>Ordenar por</option>
                                    <option value="newest">Más recientes</option>
                                    <option value="price_asc">Precio: menor a mayor</option>
                                    <option value="price_desc">Precio: mayor a menor</option>
                                    <option value="name_asc">Nombre: A-Z</option>
                                    <option value="name_desc">Nombre: Z-A</option>
                                </select>
                                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <div class="relative">
                                <select wire:model.live="perPage"
                                    class="block w-full appearance-none bg-white border border-gray-300 text-gray-700 py-2 pl-3 pr-10 rounded-md shadow-sm focus:outline-none focus:ring-zinc-500 focus:border-zincs-500">
                                    <option value="12">12 por página</option>
                                    <option value="24">24 por página</option>
                                    <option value="36">36 por página</option>
                                    <option value="48">48 por página</option>
                                </select>
                                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                                <div class="h-48 bg-gray-200 relative overflow-hidden">
                                    @if ($product->latestImage)
                                        <img src="{{ asset('storage/' . $product->latestImage->path) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover transition duration-500 hover:scale-105">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Default Image"
                                            class="w-full h-48 object-cover">
                                    @endif
                                    @if ($product->stock == 0 && !$product->allow_backorder)
                                        <div
                                            class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                            Agotado
                                        </div>
                                    @endif
                                    @if (!$product->is_physical)
                                        <div
                                            class="absolute top-2 left-2 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                            Digital
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            @if ($product->brand)
                                                <span
                                                    class="text-xs text-green-600 font-semibold">{{ $product->brand->name }}</span>
                                            @endif
                                            <h3 class="font-bold text-gray-800 hover:text-green-600 transition">
                                                <a
                                                    href="{{-- {{ route('products.show', $product->slug) }} --}}">{{ $product->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="ml-2">
                                            <span
                                                class="font-bold text-green-700">${{ number_format($product->price, 2) }}</span>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                                    <div class="flex justify-between items-center">
                                        @if ($product->category)
                                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">
                                                {{ $product->category->name }}
                                            </span>
                                        @endif
                                        <flux:button variant="primary">Añadir al carrito</flux:button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
