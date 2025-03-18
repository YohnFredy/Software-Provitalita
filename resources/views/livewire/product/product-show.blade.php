<div>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Inicio</a>
                    </li>
                    <li>
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li>
                        <a href="{{-- {{ route('categories.show', $product->category) }} --}}" class="text-gray-500 hover:text-gray-700">{{ $product->category->name ?? 'Sin categoría' }}</a>
                    </li>
                    <li>
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li>
                        <span class="text-gray-700 font-medium">{{ $product->name }}</span>
                    </li>
                </ol>
            </nav>

            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Galería de imágenes -->
                <div class="flex flex-col">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden mb-4">
                        <!-- Imagen principal -->
                        @if($product->images->count() > 0)
                            <img src="{{ asset('storage/' . $product->images[$currentImageIndex]->path) }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-full object-center object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <svg class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Miniaturas de imágenes -->
                    @if($product->images->count() > 1)
                        <div class="grid grid-cols-5 gap-2">
                            @foreach($product->images as $index => $image)
                                <button 
                                    wire:click="changeImage({{ $index }})"
                                    class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden {{ $currentImageIndex === $index ? 'ring-2 ring-indigo-500' : '' }}">
                                    <img src="{{ asset('storage/' . $image->path) }}" 
                                        alt="{{ $product->name }}" 
                                        class="w-full h-full object-center object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Información del producto -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
                        @if($product->brand)
                            <a href="{{-- {{ route('brands.show', $product->brand) }} --}}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                {{ $product->brand->name }}
                            </a>
                        @endif
                    </div>

                    <!-- Precio -->
                    <div class="mt-4">
                        <p class="text-3xl text-gray-900">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        @if($product->maximum_discount > 0)
                            <p class="text-sm text-gray-500">
                                Descuento máximo: {{ $product->maximum_discount }}%
                            </p>
                        @endif
                    </div>

                    <!-- Descripción breve -->
                    <div class="mt-6">
                        <p class="text-base text-gray-700">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Disponibilidad -->
                    @if($product->is_physical)
                        <div class="mt-6">
                            <div class="flex items-center">
                                @if($product->stock > 0 || $product->allow_backorder)
                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="ml-2 text-sm text-gray-700">
                                        @if($product->stock > 0)
                                            En stock ({{ $product->stock }} disponibles)
                                        @else
                                            Disponible bajo pedido
                                        @endif
                                    </p>
                                @else
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="ml-2 text-sm text-gray-700">
                                        Agotado
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Cantidad y botón Agregar al Carrito -->
                    <div class="mt-8">
                        <div class="flex items-center">
                            <span class="mr-3 text-gray-700">Cantidad</span>
                            <div class="flex items-center border border-gray-300 rounded-md">
                                <button 
                                    wire:click="decrementQuantity"
                                    class="px-3 py-1 text-gray-600 hover:bg-gray-100 focus:outline-none">
                                    -
                                </button>
                                <span class="px-3 py-1 text-gray-700">{{ $quantity }}</span>
                                <button 
                                    wire:click="incrementQuantity"
                                    class="px-3 py-1 text-gray-600 hover:bg-gray-100 focus:outline-none">
                                    +
                                </button>
                            </div>
                        </div>
                        
                        <button 
                            wire:click="addToCart"
                            class="mt-4 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Agregar al carrito
                        </button>
                    </div>

                    <!-- Características adicionales -->
                    @if($product->pts)
                        <div class="mt-6">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <p class="ml-2 text-sm text-gray-700">
                                    Este producto otorga {{ number_format($product->pts, 2) }} puntos
                                </p>
                            </div>
                        </div>
                    @endif

                    @if($product->commission_income)
                        <div class="mt-2">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <p class="ml-2 text-sm text-gray-700">
                                    Comisión: ${{ number_format($product->commission_income, 2) }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Pestañas de información detallada -->
            <div class="mt-16 lg:col-span-2" x-data="{ activeTab: 'specifications' }">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button 
                            @click="activeTab = 'specifications'" 
                            :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'specifications', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'specifications' }" 
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Especificaciones
                        </button>
                        <button 
                            @click="activeTab = 'information'" 
                            :class="{ 'border-indigo-500 text-indigo-600': activeTab === 'information', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'information' }" 
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                            Información
                        </button>
                    </nav>
                </div>

                <div class="mt-8">
                    <div x-show="activeTab === 'specifications'" class="prose prose-indigo max-w-none">
                        {!! $product->specifications !!}
                    </div>
                    <div x-show="activeTab === 'information'" class="prose prose-indigo max-w-none">
                        {!! $product->information !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>