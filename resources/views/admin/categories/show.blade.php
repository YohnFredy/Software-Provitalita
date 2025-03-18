<x-layouts.admin>

    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-primary leading-tight">
            Detalles de Categoría
        </h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.categories.edit', $category) }}">
                <flux:button variant="primary" icon="pencil-square"> Editar
                </flux:button>
            </a>
            <a href="{{ route('admin.categories.index') }}">
                <flux:button icon="arrow-long-left"> Volver
                </flux:button>
            </a>
        </div>
    </div>


    <div class="py-6">
        <div class="bg-white overflow-hidden border border-neutral-300 shadow-lg shadow-ink sm:rounded-lg">
            <div class="p-6">
                <!-- Card Header with Category Name -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-300 mb-6">
                    <h3 class="text-2xl font-bold text-primary">
                        {{ $category->name }}
                    </h3>
                    <span
                        class="px-3 py-1 text-xs font-medium rounded-full {{ $category->is_active ? 'bg-premium/10 text-premium' : 'bg-danger/10 text-danger' }}">
                        {{ $category->is_active ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category Information -->
                    <div class="bg-gray-50 rounded-lg p-6 shadow-md border border-neutral-300">
                        <h4 class="text-lg font-semibold text-primary mb-4">Información Básica
                        </h4>

                        <div class="space-y-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-primary">Slug</span>
                                <span
                                    class="text-ink font-mono bg-neutral-200 px-2 py-1 rounded mt-1">{{ $category->slug }}</span>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-primary">Categoría
                                    Padre</span>
                                <span class="text-ink mt-1">
                                    @if ($category->parent_id)
                                        <a href="{{ route('admin.categories.show', $category->parent) }}"
                                            class="text-primary hover:underline flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                            </svg>
                                            {{ $category->parent->name }}
                                        </a>
                                    @else
                                        <span class="italic text-ink">Ninguna</span>
                                    @endif
                                </span>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-primary">Tipo de
                                    Categoría</span>
                                <span class="mt-1">
                                    @if ($category->is_final)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-danger/10 text-danger">
                                            Categoría Final
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary">
                                            Categoría Padre
                                        </span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Subcategories Section -->
                    <div class="bg-gray-50 rounded-lg p-6 shadow-md border border-neutral-300">
                        <h4 class="text-lg font-semibold text-primary mb-4">
                            Subcategorías
                            @if ($subcategories->count() > 0)
                                <span
                                    class="ml-2 text-xs bg-primary/10  text-primary py-1 px-2 rounded-full">{{ $subcategories->count() }}</span>
                            @endif
                        </h4>

                        @if ($subcategories->isNotEmpty())
                            <ul class="divide-y divide-neutral-300">
                                @foreach ($subcategories as $subcategory)
                                    <li class="py-3 flex items-center justify-between">
                                        <a href="{{ route('admin.categories.show', $subcategory) }}"
                                            class="text-primary hover:underline flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                            </svg>
                                            {{ $subcategory->name }}
                                        </a>
                                        <span class="flex items-center">
                                            <span
                                                class="mr-2 w-2 h-2 rounded-full {{ $subcategory->is_active ? 'bg-premium' : 'bg-danger' }}"></span>
                                            <a href="{{ route('admin.categories.edit', $subcategory) }}"
                                                class="text-primary hover:text-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-neutral-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <p class="mt-2 text-gray-500 mb-2">No hay subcategorías disponibles
                                </p>
                                <a href="{{ route('admin.categories.create') }}">

                                    <flux:button icon="plus" variant="primary">
                                        Crear Subcategoría
                                    </flux:button>

                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Additional Actions -->
                <div class="mt-8 pt-6 border-t border-neutral-300">
                    <div class="flex flex-wrap gap-3 justify-end">
                        @if (!$category->is_active)
                            <flux:button type="button">
                                Activar Categoría
                            </flux:button>
                        @else
                            <flux:button variant="danger" icon="x-mark" type="button">
                                Desactivar Categoría
                            </flux:button>
                        @endif

                        <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}">
                            <flux:button variant="primary" icon="plus" type="button">
                                Añadir Subcategoría
                            </flux:button>
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro que deseas eliminar esta categoría?');">
                            @csrf @method('DELETE')
                            <flux:button type="submit" icon="archive-box-x-mark" variant="danger">
                                Eliminar
                            </flux:button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Metadata Card -->
        <div class="mt-6">
            <div class="bg-white overflow-hidden shadow-md shadow-ink border border-neutral-300 sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-primary mb-4">Información de Sistema</h4>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="bg-neutral-50 border border-neutral-300 p-4 rounded">
                            <span class="block text-gray-500">Creado</span>
                            <span
                                class="text-gray-700 dark:text-gray-200">{{ $category->created_at->format('d/m/Y H:i') }}</span>
                        </div>

                        <div class="bg-neutral-50 border border-neutral-300 p-4 rounded">
                            <span class="block text-gray-500">Última actualización</span>
                            <span
                                class="text-gray-700 dark:text-gray-200">{{ $category->updated_at->format('d/m/Y H:i') }}</span>
                        </div>

                        <div class="bg-neutral-50 border border-neutral-300 p-4 rounded">
                            <span class="block text-gray-500">ID en sistema</span>
                            <span class="text-gray-700 font-mono">{{ $category->id }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal for Delete -->
    <script>
        function confirmDelete(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta categoría? Esta acción no se puede deshacer.')) {
                event.preventDefault();
            }
        }
    </script>
</x-layouts.admin>
