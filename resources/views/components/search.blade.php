@props(['placeholder' => 'Search', 'disabled' => false])

<div class="relative flex w-full md:w-64">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'block w-full ps-10 pr-15 bg-neutral-50/50 border border-neutral-300 text-primary text-sm rounded-lg focus:outline-1 focus:outline-primary focus:bg-white p-2.5',
    ]) !!} type="text" placeholder="{{ $placeholder }}">

    <button wire:click="searchEnter"
        class="absolute right-0.5 top-0.5 px-3 py-2 bg-primary text-white border border-l-0 border-primary/20 rounded-r-md hover:bg-secondary transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
</div>
