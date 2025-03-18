<x-layouts.admin>
    <div class="mb-4 flex justify-between items-center">
        <h1 class="text-2xl font-extrabold text-primary tracking-tight">
            Crear Categoría
        </h1>
        <a href="{{ route('admin.categories.index') }}">
            <flux:button icon="arrow-long-left" type="button">
                Volver al listado
            </flux:button>
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-lg shadow-ink border border-neutral-300 rounded-lg">
        <div class="p-6 sm:p-8 bg-white">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                @livewire('admin.categories.category-form')

                <div class="mt-8 flex justify-end space-x-4">
                    <flux:button type="submit" variant="primary">
                        Guardar Categoría
                    </flux:button>
                    <a href="{{ route('admin.categories.index') }}">
                        <flux:button type="button">
                            Cancelar
                        </flux:button>
                    </a>


                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
