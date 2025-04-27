<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-neutral-50 antialiased">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-xl flex-col gap-6">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flexitems-center justify-center rounded-md">
                        <x-app-logo-icon class=" fill-current text-primary " />
                    </span>

                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <div class="flex flex-col gap-6">
                    <div class="rounded-xl sm:border sm:bg-white  text-ink sm:shadow-xs shadow-ink">
                        <div class="sm:px-10  sm:py-8">{{ $slot }}</div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
