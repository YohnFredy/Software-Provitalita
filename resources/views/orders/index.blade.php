<x-layouts.app>
    <div class="mx-auto sm:px-6 lg:px-8">
        <!-- Dashboard Header -->
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-primary">Panel de Pedidos</h1>
            <p class="text-ink mt-2">Administra y supervisa todos tus pedidos en un solo lugar</p>
        </div>

        <!-- Status Cards Section -->
        <section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 lg:gap-6 mb-8">
            <!-- Pendiente Card -->
            <a href="{{ route('orders.index') . '?status=1' }}"
                class="col-span-1 bg-white border-l-4 border-primary hover:shadow-md transition-all duration-300 rounded-lg overflow-hidden">
                <div class="bg-primary/10 p-4 flex items-center justify-between">
                    <div class="text-primary text-3xl">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <div class="text-3xl font-bold text-primary">{{ $pendientes }}</div>
                </div>
                <div class="p-4">
                    <h3 class="uppercase font-semibold text-ink text-sm tracking-wider">Pendiente</h3>
                    <div class="h-1 w-16 bg-primary mt-2 rounded-full"></div>
                </div>
            </a>

            <!-- Recibido Card -->
            <a href="{{ route('orders.index') . '?status=2' }}"
                class="col-span-1 bg-white border-l-4 border-secondary hover:shadow-md transition-all duration-300 rounded-lg overflow-hidden">
                <div class="bg-secondary/10 p-4 flex items-center justify-between">
                    <div class="text-secondary text-3xl">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="text-3xl font-bold text-secondary">{{ $recibido }}</div>
                </div>
                <div class="p-4">
                    <h3 class="uppercase font-semibold text-ink text-sm tracking-wider">Recibido</h3>
                    <div class="h-1 w-16 bg-secondary mt-2 rounded-full"></div>
                </div>
            </a>

            <!-- Enviados Card -->
            <a href="{{ route('orders.index') . '?status=4' }}"
                class="col-span-1 bg-white border-l-4 border-premium hover:shadow-md transition-all duration-300 rounded-lg overflow-hidden">
                <div class="bg-premium/10 p-4 flex items-center justify-between">
                    <div class="text-premium text-3xl">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="text-3xl font-bold text-premium">{{ $enviado }}</div>
                </div>
                <div class="p-4">
                    <h3 class="uppercase font-semibold text-ink text-sm tracking-wider">Enviados</h3>
                    <div class="h-1 w-16 bg-premium mt-2 rounded-full"></div>
                </div>
            </a>

            <!-- Entregado Card -->
            <a href="{{ route('orders.index') . '?status=5' }}"
                class="col-span-1 bg-white border-l-4 border-ink hover:shadow-md transition-all duration-300 rounded-lg overflow-hidden">
                <div class="bg-ink/10 p-4 flex items-center justify-between">
                    <div class="text-ink text-3xl">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="text-3xl font-bold text-ink">{{ $entregado }}</div>
                </div>
                <div class="p-4">
                    <h3 class="uppercase font-semibold text-ink text-sm tracking-wider">Entregado</h3>
                    <div class="h-1 w-16 bg-ink mt-2 rounded-full"></div>
                </div>
            </a>

            <!-- Anulado Card -->
            <a href="{{ route('orders.index') . '?status=6' }}"
                class="col-span-1 bg-white border-l-4 border-danger hover:shadow-md transition-all duration-300 rounded-lg overflow-hidden">
                <div class="bg-danger/10 p-4 flex items-center justify-between">
                    <div class="text-danger text-3xl">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="text-3xl font-bold text-danger">{{ $anulado }}</div>
                </div>
                <div class="p-4">
                    <h3 class="uppercase font-semibold text-ink text-sm tracking-wider">Anulado</h3>
                    <div class="h-1 w-16 bg-danger mt-2 rounded-full"></div>
                </div>
            </a>
        </section>
        <!-- Recent Orders Section -->
        <section class="bg-white rounded-lg shadow-md overflow-hidden border border-neutral-200">
            <div class="px-4 py-3 border-b border-neutral-200 flex items-center justify-between">
                <h2 class="text-base sm:text-lg font-semibold text-neutral-800">Pedidos Recientes</h2>
                <span class="text-primary text-xs sm:text-sm">{{ count($orders) }} pedidos encontrados</span>
            </div>

            <div class="divide-y divide-neutral-200">
                @foreach ($orders as $order)
                    <a href="{{ route('orders.show', $order) }}"
                        class="block p-4 hover:bg-neutral-50 transition-colors duration-150">
                        <div class="flex items-start gap-3 sm:gap-4">
                            <div
                                class="w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center rounded-full 
                        @switch($order->status)
                            @case(1) bg-primary/10 text-primary @break
                            @case(2) @case(3) bg-secondary/10 text-secondary @break
                            @case(4) bg-premium/10 text-premium @break
                            @case(5) bg-ink/10 text-ink @break
                            @case(6) bg-danger/10 text-danger @break
                        @endswitch
                    ">
                                @switch($order->status)
                                    @case(1)
                                        <i class="fas fa-business-time text-xs sm:text-sm"></i>
                                    @break

                                    @case(2)
                                    @case(3)
                                        <i class="fas fa-credit-card text-xs sm:text-sm"></i>
                                    @break

                                    @case(4)
                                        <i class="fas fa-truck text-xs sm:text-sm"></i>
                                    @break

                                    @case(5)
                                        <i class="fas fa-check-circle text-xs sm:text-sm"></i>
                                    @break

                                    @case(6)
                                        <i class="fas fa-times-circle text-xs sm:text-sm"></i>
                                    @break
                                @endswitch
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-baseline justify-between">
                                    <span class="font-medium text-neutral-900 text-sm sm:text-base truncate">Ref:
                                        {{ $order->public_order_number }}</span>
                                    <span
                                        class="ml-2 text-xs sm:text-sm text-neutral-500">{{ $order->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="text-xs sm:text-sm text-neutral-500 mt-1 truncate">
                                    Cliente: {{ $order->contact ?? 'No especificado' }}
                                </div>
                            </div>

                            <div class="text-right text-xs sm:text-sm">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full font-medium
                            @switch($order->status)
                                @case(1) bg-primary/10 text-primary @break
                                @case(2) @case(3) bg-secondary/10 text-secondary @break
                                @case(4) bg-premium/10 text-premium @break
                                @case(5) bg-ink/10 text-ink @break
                                @case(6) bg-danger/10 text-danger @break
                            @endswitch
                        ">
                                    @switch($order->status)
                                        @case(1)
                                            Pendiente
                                        @break

                                        @case(2)
                                        @case(3)
                                            Recibido
                                        @break

                                        @case(4)
                                            Enviado
                                        @break

                                        @case(5)
                                            Entregado
                                        @break

                                        @case(6)
                                            Anulado
                                        @break
                                    @endswitch
                                </span>
                                <div class="mt-1 font-bold text-neutral-900 text-sm sm:text-base">
                                    ${{ number_format($order->total, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="ml-2 sm:ml-4 text-neutral-400">
                                <i class="fas fa-chevron-right text-xs sm:text-sm"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if (count($orders) == 0)
                <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 text-neutral-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                    <h3 class="mt-3 text-base sm:text-lg font-medium text-neutral-900">No hay pedidos recientes</h3>
                    <p class="mt-1 text-xs sm:text-sm text-neutral-500">No se encontraron pedidos con los filtros
                        seleccionados.</p>
                </div>
            @endif

            @if (isset($orders) && method_exists($orders, 'links') && $orders->hasPages())
                <div class="px-4 py-3 border-t border-neutral-200">
                    {{ $orders->links() }}
                </div>
            @endif
        </section>
    </div>
</x-layouts.app>
