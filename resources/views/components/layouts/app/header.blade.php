@php

    // Array de rutas para la barra de navegación
    $navbarRoutes = [
        [
            'type' => 'route',
            'name' => 'Home',
            'icon' => 'home',
            'route' => 'home',
            'routeIs' => 'home',
        ],
        [
            'type' => 'route',
            'name' => 'Productos',
            'icon' => 'shopping-cart',
            'route' => 'products.index',
            'routeIs' => 'products*',
        ], 
        [
            'type' => 'anchor',
            'name' => 'Nosotros',
            'icon' => 'hand-thumb-up',
            'route' => '#nosotros',
            'routeIs' => 'home',
        ],
        [
            'type' => 'anchor',
            'name' => 'Contáctanos',
            'icon' => 'contact',
            'route' => '#contacto',
            'routeIs' => 'home',
        ],
        [
            'type' => 'route',
            'name' => 'Oficina',
            'icon' => 'building-office-2',
            'route' => 'dashboard',
            'routeIs' => 'dashboard',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{-- class="dark" --}}>

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white text-ink">
    <flux:header container class="border-b border-zinc-200 shadow-md shadow-primary/50">
        <flux:sidebar.toggle class="lg:hidden text-danger! hover:text-primary!" icon="bars-2" inset="left" />

        <a href="{{ route('home') }}" class="ml-2 mr-5 flex items-center space-x-2 lg:ml-0" wire:navigate>
            <x-app-logo />
        </a>

        {{--  <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="layout-grid" :href="route('dashboard')"
                :current="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </flux:navbar.item>
        </flux:navbar> --}}

        <flux:navbar  class="-mb-px max-lg:hidden">
            @foreach ($navbarRoutes as $route)
                @if ($route['type'] === 'route')
                    <flux:navbar.item  icon="{{ $route['icon'] }}" :href="route($route['route'])"
                        :current="request()->routeIs($route['routeIs'])" wire:navigate>
                        {{ __($route['name']) }}
                    </flux:navbar.item>
                @elseif ($route['type'] === 'anchor')
                    <a href="{{ route($route['routeIs']) }}{{ $route['route'] }}">
                        <flux:navbar.item icon="{{ $route['icon'] }}" class=" cursor-pointer">
                            {{ __($route['name']) }}
                        </flux:navbar.item>
                    </a>
                @endif
            @endforeach
        </flux:navbar>
        <flux:spacer />

        <flux:navbar class="mr-1.5 space-x-0.5 py-0!">
            {{-- <flux:tooltip content="Search" position="bottom">
                <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#"
                    label="Search" />
            </flux:tooltip> --}}
            {{-- <flux:tooltip content="Repository" position="bottom">
                <flux:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="folder-git-2"
                    href="https://github.com/laravel/livewire-starter-kit" target="_blank" label="Repository" />
            </flux:tooltip> --}}
            {{-- <flux:tooltip content="Documentation" position="bottom">
                <flux:navbar.item class="h-10 max-lg:hidden [&>div>svg]:size-5" icon="book-open-text"
                    href="https://laravel.com/docs/starter-kits" target="_blank" label="Documentation" />
            </flux:tooltip> --}}
        </flux:navbar>

        <!-- Desktop User Menu -->
        <flux:dropdown position="top" align="end">
            @auth
                <flux:profile class="cursor-pointer" :initials="auth()->user()->initials()" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            @else
                <flux:link class="flex text-primary" href="{{ route('login') }}" wire:navigate> <span class=" flex items-center">
                        Login <flux:icon.arrow-right-start-on-rectangle class="ml-0" /> </span> </flux:link>
            @endauth
        </flux:dropdown>
    </flux:header>

    <!-- Mobile Menu -->
    <flux:sidebar stashable sticky
        class="lg:hidden border-r border-zinc-200 bg-zinc-50">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

        <a href="{{ route('home') }}" class="ml-1 flex items-center space-x-2" wire:navigate>
            <x-app-logo />
        </a>

        {{-- <flux:navlist variant="outline">
            <flux:navlist.group heading="Platform">
                <flux:navlist.item icon="layout-grid" :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist> --}}

        <flux:navlist variant="outline">
            <flux:navlist.group heading="Platform">
                @foreach ($navbarRoutes as $route)
                    @if ($route['type'] === 'route')
                        <flux:navlist.item icon="{{ $route['icon'] }}" :href="route($route['route'])"
                            :current="request()->routeIs($route['routeIs'])" wire:navigate>
                            {{ __($route['name']) }}
                        </flux:navlist.item>
                    @elseif ($route['type'] === 'anchor')
                        <a href="{{ route($route['routeIs']) }}{{ $route['route'] }}" x-on:click="document.body.removeAttribute('data-show-stashed-sidebar')">
                            <flux:navlist.item icon="{{ $route['icon'] }}" class="cursor-pointer">
                                {{ __($route['name']) }}
                            </flux:navlist.item>
                        </a>
                    @endif
                @endforeach
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
{{-- 
            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item> --}}
        </flux:navlist>
    </flux:sidebar>

    {{ $slot }}

    <flux:footer>
        <footer class="bg-ink text-white rounded-md p-4 sm:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <div>
                        {{-- <img class="h-12 w-auto mb-6" src="/api/placeholder/200/80" alt="ActivosNetwork Logo"> --}}
                        <p class=" text-xl text-white  font-bold w-auto mb-6">ActivosNetwork</p>
                        <p class="text-neutral-200 mb-6">Una compañía en el sector de salud y bienestar que ofrece
                            múltiples
                            oportunidades financieras a través de un sistema global de asociación.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-neutral-200 hover:text-white transition duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-neutral-200 hover:text-white transition duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-neutral-200 hover:text-white transition duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-neutral-200 hover:text-white transition duration-300">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-6">Vehículos Financieros</h3>
                        <ul class="space-y-3">
                            <li><a href="{{route('home')}}#franquicias" class="text-neutral-200 hover:text-white transition duration-300">ActivosNetwork
                                    Coffee</a></li>
                            <li><a href="{{route('home')}}#franquicias"
                                    class="text-neutral-200 hover:text-white transition duration-300">Chelas</a></li>
                            <li><a href="{{route('home')}}#franquicias"
                                    class="text-neutral-200 hover:text-white transition duration-300">ActivosNetowork</a></li>
                            <li><a href="{{route('home')}}#franquicias"
                                    class="text-neutral-200 hover:text-white transition duration-300">Maspro</a></li>
                            <li><a href="{{route('home')}}#franquicias" class="text-neutral-200 hover:text-white transition duration-300">Net
                                    Inmobiliario</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-6">Enlaces rápidos</h3>
                        <ul class="space-y-3">
                            <li><a href="{{route('home')}}"
                                    class="text-neutral-200 hover:text-white transition duration-300">Inicio</a></li>
                            <li><a href="{{route('home')}}#nosotros"
                                    class="text-neutral-200 hover:text-white transition duration-300">Nosotros</a></li>
                            <li><a href="{{route('home')}}#franquicias"
                                    class="text-neutral-200 hover:text-white transition duration-300">Vehículos
                                    Financieros</a></li>
                            <li><a href="{{route('home')}}#inversion"
                                    class="text-neutral-200 hover:text-white transition duration-300">Modelos de
                                    Inversión</a>
                            </li>
                            <li><a href="{{route('home')}}#diferencias"
                                    class="text-neutral-200 hover:text-white transition duration-300">¿Por
                                    qué ActivosNetwork?</a></li>
                            <li><a href="{{route('home')}}#contacto"
                                    class="text-neutral-200 hover:text-white transition duration-300">Contacto</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-6">Contacto</h3>
                        <ul class="space-y-3 text-neutral-200">
                            {{-- <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                                <span>Av. Principal #123, Ciudad Capital</span>
                            </li> --}}
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-3"></i>
                                <span>+57 (318) 813-2381</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-3"></i>
                                <span>inf@activosnetwork.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2025 ActivosNetwork. Todos los derechos
                            reservados.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#"
                                class="text-gray-400 hover:text-white text-sm transition duration-300">Términos y
                                condiciones</a>
                            <a href="#"
                                class="text-gray-400 hover:text-white text-sm transition duration-300">Política de
                                privacidad</a>
                            <a href="#"
                                class="text-gray-400 hover:text-white text-sm transition duration-300">Aviso
                                legal</a>
                        </div>
                    </div>
                </div>
            
        </footer>
    </flux:footer>

    @fluxScripts
</body>

</html>
