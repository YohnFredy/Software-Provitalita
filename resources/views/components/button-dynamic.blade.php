@props(['color' => 'primary'])

@php
    // Definimos las clases de diseño base para el botón
    $baseClasses =
        'text-center px-4 py-3  rounded-md font-semibold text-xs uppercase tracking-widest   disabled:opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150';

    // Definimos las clases de color y efecto hover basadas en el color proporcionado
    $colorClasses = match ($color) {
        'primary' => 'bg-primary hover:bg-secondary text-neutral-100 hover:text-white  focus:ring-secondary',
        'white' => 'bg-neutral-200 hover:bg-white text-primary hover:text-secondary  focus:ring-neutral-200 focus:ring-offset-secondary',
    };
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => "$baseClasses $colorClasses"]) }}>
    {{ $slot }}
</button>