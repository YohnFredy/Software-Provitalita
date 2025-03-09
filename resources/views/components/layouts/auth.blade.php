<div>
    <div class="hidden sm:block">
        <x-layouts.auth.card>
            {{ $slot }}
        </x-layouts.auth.card>
    </div>
    
    <div class="sm:hidden">
        <x-layouts.auth.simple>
            {{ $slot }}
        </x-layouts.auth.simple>
    </div>
</div>