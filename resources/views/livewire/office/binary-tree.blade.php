@push('css')
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

<div>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">
            <i class="fas fa-home mr-1"></i> Home
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item>
            <i class="fas fa-network-wired mr-1"></i> Binario
        </flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('unilevel-tree') }}">
            <i class="fas fa-sitemap mr-1"></i> Unilevel
        </flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="flex justify-between items-center mb-2 mt-2 sm:mt-4">
        <h1 class="font-bold text-xl md:text-2xl text-primary mt-4 flex items-center">
            <i class="fas fa-diagram-project mr-2"></i> Red Binaria
        </h1>
    </div>

    <!-- Leyenda de árbol -->
    <div class="bg-white p-4 rounded-lg mb-4 shadow-md shadow-ink border border-zinc-200">
        <div class="flex flex-wrap items-center gap-4">
            <span class="font-semibold text-primary"><i class="fas fa-info-circle bg-white mr-1"></i>
                Rango: Asociado:</span>
            <div class="flex items-center">
                <div class="w-4 h-4 rounded-full bg-neutral-300 mr-2"></div>
                <span>Usuario Activo</span>
            </div>

            <div class="flex items-center">
                <div class="w-4 h-4 rounded-full bg-danger mr-2"></div>
                <span>Inactivo</span>
            </div>
        </div>
    </div>

    <!-- Filtros y búsqueda rápida -->
    <div class="bg-white p-3 sm:p-4 rounded-lg mb-4 shadow-md shadow-ink border border-zinc-300">

        <div class=" grid grid-cols-6 gap-2 sm:gap-4">
            <div class=" col-span-6 sm:col-span-4 relative">
                <input disabled type="text" wire:model.debounce.300ms="search"
                    placeholder="Buscar usuario en el árbol..."
                    class="w-full pl-10 pr-4 py-2 text-sm sm:text-base border rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-primary"></i>
            </div>

            <div class="col-span-3 sm:col-span-1">
                <select
                    class=" w-full text-xs sm:text-sm px-2 sm:px-3 py-1.5 sm:py-2 border rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary bg-white transition-colors">
                    <option value="">Niveles</option>
                    <option value="1" disabled>Nivel 1</option>
                    <option value="2" disabled>Nivel 2</option>
                    <option value="3" disabled>Nivel 3</option>
                </select>
            </div>
            <div class="col-span-3 sm:col-span-1">
                <select
                    class=" w-full text-xs sm:text-sm px-2 sm:px-3 py-1.5 sm:py-2 border rounded-lg focus:ring-2 focus:ring-primary/30 focus:border-primary bg-white transition-colors">
                    <option value="">Estados</option>
                    <option value="active" disabled>Activos</option>
                    <option value="pending" disabled>Pendientes</option>
                    <option value="inactive" disabled>Inactivos</option>
                </select>
            </div>

        </div>


    </div>

    <!-- Contenedor principal del árbol con navegación -->
    <div class="sm:shadow-md shadow-ink rounded-lg py-2" x-data="treeZoom()">
        <!-- Control de navegación -->
        <div class="flex justify-between px-4">
            <div class="flex items-center space-x-2">
                <button @click="decreaseZoom()"
                    class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-primary/30">
                    <i class="fas fa-minus"></i>
                </button>

                <!-- Botón de aumentar zoom solo visible cuando zoom < 100% -->
                <button @click="increaseZoom()" x-show="showZoomInButton"
                    class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-primary/30">
                    <i class="fas fa-plus"></i>
                </button>

                <button @click="resetZoom()"
                    class="p-2 rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring focus:ring-primary/30">
                    <i class="fas fa-expand"></i>
                </button>

                <span class="text-ink text-sm" x-text="`Zoom: ${Math.round(currentZoom * 100)}%`"></span>
            </div>
        </div>

        <!-- Indicador de carga -->
        <div x-show="!isLoaded" class="flex justify-center items-center py-12">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
        </div>

        <!-- Árbol binario -->
        <div class="flex justify-center overflow-hidden transition-all duration-300 min-h-[50vh]"
            :style="`height: ${isLoaded ? containerHeight : '50vh'}px`">
            <div class="caja">
                <div id="tree-container" class="tree px-2 transform-gpu transition-transform duration-300"
                    x-ref="treeContainer"
                    :style="`transform: scale(${currentZoom}, ${currentZoom}); transform-origin: top center;`"
                    @transitionend="updateContainerHeight()">
                    <ul>
                        @include('livewire.office.children-binary', ['node' => $tree])
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de paneles de información -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Panel de usuario -->
        <div class="bg-white rounded-lg shadow-md shadow-ink hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-primary/10 p-4 border-b flex items-center">
                <i class="fas fa-user-circle text-2xl text-primary mr-3"></i>
                <h2 class="text-xl font-bold text-primary">Información del Usuario</h2>
            </div>
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div
                        class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center text-2xl mr-4">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">{{ $currentUser->name }} {{ $currentUser->last_name }}</h3>
                        <div class="flex items-center">
                            <span class="px-2 py-1 bg-premium text-white text-xs rounded-full mr-2">Asociado</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-user w-6 text-ink"></i>
                        <span class="ml-2"><strong>Username:</strong><span
                                class="ml-1">{{ $currentUser->username }}</span></span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar-alt w-6 text-ink"></i>
                        <span class="ml-2"><strong>Ingreso:</strong><span
                                class="ml-1">{{ $currentUser->created_at->format('d/m/Y') }}</span></span>
                    </div>
                    {{--  <div class="flex items-center">
                        <i class="fas fa-star w-6 text-ink"></i>
                        <span class="ml-2"><strong>Puntos Acumulados:</strong> 0 </span>
                    </div> --}}

                    <div class="flex items-center">
                        <i class="fas fa-link w-6 text-ink"></i>
                        <span class="ml-2"><strong>Patrocinador:</strong> <span
                                class=" ml-1">{{ $sponsor->username }}</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas del árbol -->
        <div class="bg-white rounded-lg shadow-md shadow-ink hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-primary/10 p-4 border-b flex items-center">
                <i class="fas fa-chart-line text-2xl text-primary mr-3"></i>
                <h2 class="text-xl font-bold text-primary">Estadísticas del Árbol</h2>
            </div>
            <div class="p-6">

                <div class=" flex justify-center items-center mb-4">
                    <div class="bg-primary/10 p-3 rounded-lg text-center">
                        <div class="text-primary text-3xl font-bold">
                            {{ $totalAffiliates }}
                        </div>
                        <div class="text-ink text-sm">Total Usuarios Binario</div>
                    </div>

                </div>

                <div class="bg-primary/10 p-4 rounded-lg mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium text-primary">Izquierda</span>
                        <span class="font-medium text-secondary">Derecha</span>
                    </div>
                    <div class="flex h-4 rounded-full overflow-hidden bg-white mb-1">
                        <div class="bg-primary" style="width: {{ $leftPercentage }}%"></div>
                        <div class="bg-secondary" style="width: {{ $rightPercentage }}%"></div>
                    </div>
                    <div class="flex justify-between text-sm text-ink">
                        <span>{{ $ptsLeft }} puntos</span>
                        <span>{{ $ptsRight }} puntos</span>
                    </div>
                </div>

                {{-- <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-users w-6 text-ink"></i>
                        <span class="ml-2"><strong>Activos:</strong> 0</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-user-clock w-6 text-ink"></i>
                        <span class="ml-2"><strong>Pendientes:</strong> 0</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar-week w-6 text-ink"></i>
                        <span class="ml-2"><strong>Esta semana:</strong> 0 nuevos</span>
                    </div>
                </div> --}}
            </div>
        </div>

        <!-- Acciones rápidas -->
        <div class="bg-white rounded-lg shadow-md shadow-ink hover:shadow-lg transition-shadow overflow-hidden">
            <div class="bg-primary/10 p-4 border-b flex items-center">
                <i class="fas fa-bolt text-2xl text-primary mr-3"></i>
                <h2 class="text-xl font-bold text-primary">Acciones Rápidas</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <div class="relative">
                        <input disabled type="text" wire:model="searchUser"
                            placeholder="Buscar por username o email"
                            class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring focus:ring-primary/30 focus:border-primary">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button
                        class="w-full mt-2 bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Buscar
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-3 mb-4">
                    <a href="{{ route('dashboard') }}#link-sponsor"
                        class="bg-primary/20 hover:bg-primary/10 text-primary p-3 rounded-lg flex flex-col items-center">
                        <i class="fas fa-user-plus text-2xl mb-1"></i>
                        <span class="text-sm">Añadir Usuario</span>
                    </a>

                    <a href="{{ route('unilevel-tree') }}"
                        class="bg-danger/20 hover:bg-danger/10 text-danger p-3 rounded-lg flex flex-col items-center">
                        <i class="fas fa-sitemap text-2xl mb-1"></i>
                        <span class="text-sm">Ver Unilevel</span>
                    </a>
                    {{--   <button
                        class="bg-premium/20 hover:bg-premium/10 text-premium p-3 rounded-lg flex flex-col items-center">
                        <i class="fas fa-chart-pie text-2xl mb-1"></i>
                        <span class="text-sm">Estadísticas</span>
                    </button>
                    <button
                        class="bg-secondary/20 hover:bg-secondary/10 text-secondary p-3 rounded-lg flex flex-col items-center">
                        <i class="fas fa-dollar-sign text-2xl mb-1"></i>
                        <span class="text-sm">Comisiones</span>
                    </button> --}}
                </div>

                {{-- <div class="bg-gray-50 p-3 rounded-lg">
                    <h3 class="font-medium mb-2 flex items-center">
                        <i class="fas fa-info-circle text-primary mr-1"></i> Ayuda Rápida
                    </h3>
                    <p class="text-sm text-ink mb-2">Explore su red de afiliados y rastree el progreso de su
                        equipo utilizando estas herramientas.</p>
                    <a href="#" class="text-primary text-sm hover:underline flex items-center">
                        <i class="fas fa-book mr-1"></i> Ver tutorial completo
                    </a>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Resumen de actividad reciente -->
    <div class="bg-white rounded-lg shadow-md shadow-ink mt-6 overflow-hidden">
        <div class="bg-primary/10 p-4 border-b flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-history text-2xl text-primary mr-3"></i>
                <h2 class="text-xl font-bold text-primary">Actividad Reciente</h2>
            </div>
            <a href="#" class="text-primary hover:underline text-sm">Ver todo</a>
        </div>
        <div class="p-4">
            @if (false)
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">Usuario</th>
                            <th class="px-4 py-2 text-left">Acción</th>
                            <th class="px-4 py-2 text-left">Fecha</th>
                            <th class="px-4 py-2 text-left">Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contenido de la tabla -->
                    </tbody>
                </table>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-clock text-gray-300 text-4xl mb-3"></i>
                    <p class="text-ink">No hay actividad reciente para mostrar</p>
                </div>
            @endif
        </div>
    </div>

</div>
