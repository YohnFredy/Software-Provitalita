<div>

    <div class="p-6 bg-white/80 shadow-lg shadow-ink rounded-lg min-h-screen">
        <!-- Header del Dashboard -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-primary">Oficina Virtual</h1>
                <p class="text-ink">Bienvenido de nuevo, Usuario</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="p-2 bg-white rounded-full text-primary hover:bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <span class="absolute top-0 right-0 h-3 w-3 rounded-full bg-danger border-2 border-white"></span>
                </div>
                <div class="flex items-center rounded-full py-1 px-2 shadow-sm ">
                    <span class="font-medium text-sm text-primary  up">{{ $user->name }}</span>
                </div>
            </div>
        </div>

        <!-- Cards de resumen -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg  shadow-md shadow-ink hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-primary">Ganancias Totales</p>
                        <h3 class="text-2xl font-bold text-ink mt-1">$0</h3>
                        <span class="inline-flex items-center text-sm text-premium mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            0% vs mes pasado
                        </span>
                    </div>
                    <div class="p-3 bg-secondary/5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg  shadow-md shadow-ink hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-primary">Nuevos Socios</p>
                        <h3 class="text-2xl font-bold text-ink mt-1">0</h3>
                        <span class="inline-flex items-center text-sm text-premium mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            0% vs mes pasado
                        </span>
                    </div>
                    <div class="p-3 bg-primary/5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg  shadow-md shadow-ink hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-primary">Rango alcanzado</p>
                        <h3 class="text-2xl font-bold text-ink mt-1">Asociado</h3>
                        <span class="inline-flex items-center text-sm text-primary mt-2">
                            Próximo nivel: Aprendiz
                        </span>
                    </div>
                    <div class="p-3 bg-premium/5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-premium" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg  shadow-md shadow-ink hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-primary">Socios Activos</p>
                        <h3 class="text-2xl font-bold text-ink mt-1">0</h3>
                        <span class="inline-flex items-center text-sm text-premium mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" />
                            </svg>
                            0% vs mes pasado
                        </span>
                    </div>
                    <div class="p-3 bg-danger/5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-danger" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos y Estadísticas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Gráfico de Rendimiento -->
            <div class="bg-white p-6 rounded-lg shadow-md shadow-ink">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-primary">Rendimiento de Red</h2>
                    <div class="flex bg-zinc-50 rounded-lg p-1 text-sm shadow-xs shadow-ink">
                        <button
                            class="px-3 py-1 rounded bg-white shadow shadow-ink text-ink font-medium">Semana</button>
                        <button class="px-3 py-1 text-gray-600">Mes</button>
                        <button class="px-3 py-1 text-gray-600">Año</button>
                    </div>
                </div>
                <div class="h-64 flex items-end space-x-2">
                    <div class="bg-primary rounded-t w-full h-16 hover:bg-secondary transition-colors"></div>
                    <div class="bg-primary rounded-t w-full h-28 hover:bg-secondary transition-colors"></div>
                    <div class="bg-primary rounded-t w-full h-20 hover:bg-secondary transition-colors"></div>
                    <div class="bg-primary rounded-t w-full h-24 hover:bg-secondary transition-colors"></div>
                    <div class="bg-primary rounded-t w-full h-32 hover:bg-secondary transition-colors"></div>
                    <div class="bg-primary rounded-t w-full h-40 hover:bg-secondary transition-colors"></div>
                    <div class="bg-secondary rounded-t w-full h-52 hover:bg-primary transition-colors"></div>
                </div>
                <div class="flex justify-between mt-2 text-xs text-primary">
                    <span>Lun</span>
                    <span>Mar</span>
                    <span>Mié</span>
                    <span>Jue</span>
                    <span>Vie</span>
                    <span>Sáb</span>
                    <span>Dom</span>
                </div>
            </div>

            <!-- Estructura de Red -->
            {{-- <div class="bg-white p-6 rounded-lg shadow-md shadow-ink">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-primary">Estructura de Red</h2>
                    <button class="text-primary text-sm font-medium hover:text-secondary">Ver Detalle</button>
                </div>
                <div class="flex justify-center mb-6">
                    <div class="relative h-64 w-64">
                        <!-- Círculo central -->
                        <div
                            class="absolute inset-0 rounded-full border-4 border-primary flex items-center justify-center">
                            <div
                                class="bg-primary h-16 w-16 rounded-full flex items-center justify-center text-white font-bold">
                                TÚ</div>
                        </div>

                        <!-- Círculo nivel 1 -->
                        <div class="absolute inset-0 rounded-full border-2 border-purple-400"
                            style="transform: scale(0.75); opacity: 0.6;"></div>
                        <div
                            class="absolute h-6 w-6 rounded-full bg-purple-400 top-12 left-0 flex items-center justify-center text-xs text-white font-bold">
                            6</div>
                        <div
                            class="absolute h-6 w-6 rounded-full bg-purple-400 top-2 left-16 flex items-center justify-center text-xs text-white font-bold">
                            4</div>
                        <div
                            class="absolute h-6 w-6 rounded-full bg-purple-400 top-12 right-0 flex items-center justify-center text-xs text-white font-bold">
                            5</div>

                        <!-- Círculo nivel 2 -->
                        <div class="absolute inset-0 rounded-full border-2 border-green-400"
                            style="transform: scale(0.5); opacity: 0.6;"></div>
                        <div
                            class="absolute h-5 w-5 rounded-full bg-green-400 bottom-12 left-0 flex items-center justify-center text-xs text-white font-bold">
                            9</div>
                        <div
                            class="absolute h-5 w-5 rounded-full bg-green-400 bottom-2 left-16 flex items-center justify-center text-xs text-white font-bold">
                            7</div>
                        <div
                            class="absolute h-5 w-5 rounded-full bg-green-400 bottom-12 right-0 flex items-center justify-center text-xs text-white font-bold">
                            8</div>
                    </div>
                </div>
                <div class="flex justify-between space-x-2 text-sm">
                    <div class="flex-1 bg-gray-100 p-3 rounded-lg">
                        <p class="text-primary text-xs">Nivel 1</p>
                        <p class="font-bold">15 Socios</p>
                    </div>
                    <div class="flex-1 bg-gray-100 p-3 rounded-lg">
                        <p class="text-primary text-xs">Nivel 2</p>
                        <p class="font-bold">68 Socios</p>
                    </div>
                    <div class="flex-1 bg-gray-100 p-3 rounded-lg">
                        <p class="text-primary text-xs">Nivel 3+</p>
                        <p class="font-bold">286 Socios</p>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Listado de Socios y Actividades -->
       {{--  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Socios Recientes -->
            <div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-primary">Últimos Socios Incorporados</h2>
                    <button class="text-primary text-sm font-medium hover:text-blue-600">Ver Todos</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-left py-3 px-4 text-sm font-medium text-primary">Nombre</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-primary">Nivel</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-primary">Fecha</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-primary">Patrocinador</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-primary">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/30/30" alt="Avatar"
                                            class="h-8 w-8 rounded-full mr-3" />
                                        <div>
                                            <p class="font-medium text-ink">Carolina Méndez</p>
                                            <p class="text-xs text-primary">carolina@ejemplo.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-ink">Nivel 1</td>
                                <td class="py-3 px-4 text-ink">3 mar 2025</td>
                                <td class="py-3 px-4 text-ink">Tú</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Activo</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/30/30" alt="Avatar"
                                            class="h-8 w-8 rounded-full mr-3" />
                                        <div>
                                            <p class="font-medium text-ink">Roberto Sánchez</p>
                                            <p class="text-xs text-primary">roberto@ejemplo.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-ink">Nivel 2</td>
                                <td class="py-3 px-4 text-ink">1 mar 2025</td>
                                <td class="py-3 px-4 text-ink">María López</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Activo</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/30/30" alt="Avatar"
                                            class="h-8 w-8 rounded-full mr-3" />
                                        <div>
                                            <p class="font-medium text-ink">Daniel Torres</p>
                                            <p class="text-xs text-primary">daniel@ejemplo.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-ink">Nivel 1</td>
                                <td class="py-3 px-4 text-ink">28 feb 2025</td>
                                <td class="py-3 px-4 text-ink">Tú</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Pendiente</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/30/30" alt="Avatar"
                                            class="h-8 w-8 rounded-full mr-3" />
                                        <div>
                                            <p class="font-medium text-ink">Luis Ramírez</p>
                                            <p class="text-xs text-primary">luis@ejemplo.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-ink">Nivel 3</td>
                                <td class="py-3 px-4 text-ink">25 feb 2025</td>
                                <td class="py-3 px-4 text-ink">Carlos Díaz</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Activo</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Próximas Actividades -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-primary">Próximas Actividades</h2>
                    <button class="text-primary text-sm font-medium hover:text-blue-600">Ver Calendario</button>
                </div>
                <div class="space-y-4">
                    <div
                        class="p-4 border border-l-4 border-l-primary rounded bg-blue-50 hover:bg-primary transition-colors">
                        <p class="font-medium text-ink">Webinar de Lanzamiento</p>
                        <div class="flex items-center mt-2 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            7 mar 2025, 18:00
                        </div>
                    </div>

                    <div class="p-4 border border-l-4 border-l-purple-500 rounded hover:bg-gray-50 transition-colors">
                        <p class="font-medium text-ink">Capacitación de Producto</p>
                        <div class="flex items-center mt-2 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            10 mar 2025, 15:00
                        </div>
                    </div>

                    <div class="p-4 border border-l-4 border-l-premium rounded hover:bg-gray-50 transition-colors">
                        <p class="font-medium text-ink">Reunión de Equipo</p>
                        <div class="flex items-center mt-2 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            15 mar 2025, 10:00
                        </div>
                    </div>

                    <div class="p-4 border border-l-4 border-l-yellow-500 rounded hover:bg-gray-50 transition-colors">
                        <p class="font-medium text-ink">Entrega de Reconocimientos</p>
                        <div class="flex items-center mt-2 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            20 mar 2025, 19:00
                        </div>
                    </div>

                    <button class="w-full py-2 text-center text-sm text-primary hover:text-blue-700 font-medium mt-4">+
                        Agregar Nueva Actividad</button>
                </div>
            </div>
        </div> --}}
    

        
        <div class=" p-6 text-center rounded-xl shadow-md shadow-ink">
            <div>
                <flux:heading class="text-primary!" size="lg">Link patrocinador lado derecho</flux:heading>
                <p id="p1" class="hidden">
                    http://activosactivosnetwork.test/register/{{ $user->username}}/right</p>

                <div class="space-y-2">
                    <div>
                        <flux:button variant="primary" class="cursor-pointer mt-2" onclick="copiarAlPortapapeles('p1')">
                            Clic para Copiar <i class="fas fa-copy mr-2"></i></flux:button>
                    </div>

                    <div>
                        <flux:link class=" text-danger hover:text-premium"
                            href="{{ route('register', [$user->username, 'right']) }}">
                            Registrar lado derecho.
                        </flux:link>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <flux:heading class="text-primary!" size="lg">Link patrocinador lado izquierdo</flux:heading>

                <p id="p2" class="hidden">
                    http://activosactivosnetwork.test/register/{{ $user->username }}/left</p>

                <div class=" space-y-2">
                    <div>
                        <flux:button variant="primary" class="cursor-pointer mt-2" onclick="copiarAlPortapapeles('p2')">
                            Clic para Copiar <i class="fas fa-copy mr-2"></i></flux:button>
                    </div>

                    <div>
                        <flux:link class=" text-danger hover:text-premium "
                            href="{{ route('register', [$user->username, 'left']) }}">
                            Registrar lado Izquierdo.
                        </flux:link>
                    </div>
                </div>
            </div>



        </div>
    
    </div>













    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            
            
          


    </div>

    <script>
        function copiarAlPortapapeles(id_elemento) {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
    </script>
</div>
