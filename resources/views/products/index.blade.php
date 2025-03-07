<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos Naturales22') }}
        </h2>
    </x-slot>
    <div>
        @livewire('product.product-listing')
    </div>

</x-layouts.app>
