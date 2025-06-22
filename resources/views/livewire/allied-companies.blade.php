<div class="">
    <div class="mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Directorio de Comercios
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Encuentra comercios y empresas en toda la región. Filtra por categoría, ubicación y más.
            </p>
        </div>

        <!-- Filtros -->
        <div class="bg-white rounded-2xl shadow-md shadow-ink/50 border border-gray-300 p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4">
                        </path>
                    </svg>
                    Filtros de Búsqueda
                </h2>

                <button wire:click="clearFilters"
                    class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Limpiar Filtros
                </button>
            </div>

            <div class=" grid grid-cols-4 gap-2">

                <div class="col-span-4 md:col-span-1">
                    <x-select wire:model.live="selectedCategory" label="Categoria:" for="selectedCategory"
                        placeholder="Seleccione una Categoria..." :options="$categories" required />
                </div>

                <!-- Pais -->
                <div class="col-span-4 md:col-span-1">
                    <x-select wire:model.live="selectedCountry" label="País:" for="selectedCountry"
                        placeholder="Seleccione un país..." :options="$countries" required />
                </div>


                <!-- Departamento -->
                @if ($selectedCountry)

                    <div class="col-span-4 md:col-span-1">
                        <x-select wire:model.live="selectedDepartment" label="Departamento:" for="selectedDepartment"
                            placeholder="Seleccione un departamento..." :options="$departments" />
                    </div>


                    <!-- ciudad -->
                    @if ($selectedDepartment && count($cities) > 0)

                        <div class="relative mb-5 col-span-4 md:col-span-1">

                            <label for="Ciudad" class="block mb-2 text-sm font-medium text-primary ">Ciudad:</label>

                            <select wire:model.live="selectedCity"
                                class="block w-full bg-neutral-50/50 appearance-none border border-gray-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5 cursor-pointer">
                                <option value="" disabled>Seleccione una ciudad..</option>
                                @foreach ($cities as $city)
                                    <option value={{ $city->city }}>{{ $city->city }}</option>
                                @endforeach
                            </select>


                            <div class="absolute inset-y-0 right-5 top-8 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                        </div>
                    @endif


                @endif

            </div>

            <hr>
            <!-- Tabla de productos mejorada -->
            <div class="overflow-x-auto mt-5">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-neutral-50">
                        <tr class="text-xs font-medium text-primary uppercase tracking-wider">
                            <th scope="col" class="px-6 py-4 text-left">Nombre</th>
                            <th scope="col" class="px-6 py-4 text-left">Nit</th>
                            <th scope="col" class="px-6 py-4 text-left">Ciudad</th>
                            <th scope="col" class="px-6 py-4 text-left">Telefóno</th>

                            <th scope="col" class="px-6 py-4 text-left">Dirección</th>
                            <th scope="col" class="px-6 py-4 text-left">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-neutral-300">
                        @forelse ($businesses as $business)

                            @foreach ($business->data as $data)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">

                                    <td class="px-6 py-4 whitespace-nowrap">{{ $business->name }}</td>
                                    <td class="px-6 py-4 ">{{ $business->nit }} </td>

                                    @if ($data->city_id)
                                        <td class="px-6 py-4 ">{{ $data->city_id }}</td>
                                    @else
                                        <td class="px-6 py-4 ">{{ $data->city }}</td>
                                    @endif
                                    <td class="px-6 py-4 ">{{ $data->phone }}</td>
                                    <td class="px-6 py-4 ">{{ $data->address }}</td>

                                    <td class="px-6 py-4 "><i class="far fa-eye"></i></td>

                                </tr>
                            @endforeach



                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-primary/10 p-5 rounded-full mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <p class="text-primary font-medium mb-1">No se encontraron comercios aliados</p>
                                        <p class="text-ink text-sm">No hay comercios aliados disponibles para mostrar
                                        </p>
                                        @if (!empty($this->searchTerms))
                                            <flux:button wire:click="" class=" mt-4">
                                                Limpiar búsqueda
                                            </flux:button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
