{{-- Credit: Lucide (https://lucide.dev) --}}

@props([
    'variant' => 'outline',
])

@php
    if ($variant === 'solid') {
        throw new \Exception('The "solid" variant is not supported in Lucide.');
    }

    $classes = Flux::classes('shrink-0')->add(
        match ($variant) {
            'outline' => '[:where(&)]:size-6',
            'solid' => '[:where(&)]:size-6',
            'mini' => '[:where(&)]:size-5',
            'micro' => '[:where(&)]:size-4',
        },
    );

    $strokeWidth = match ($variant) {
        'outline' => 2,
        'mini' => 2.25,
        'micro' => 2.5,
    };
@endphp

<svg
    {{ $attributes->class($classes) }}
    data-flux-icon
     xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 24 24" 
     fill="none" 
     stroke="currentColor" 
     stroke-width="{{ $strokeWidth }}" 
     stroke-linecap="round" 
     stroke-linejoin="round" 
     class="lucide lucide-contact">
     <path d="M16 2v2"/>
     <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/>
     <path d="M8 2v2"/>
     <circle cx="12" cy="11" r="3"/>
     <rect x="3" y="4" width="18" height="18" rx="2"/>
</svg>


