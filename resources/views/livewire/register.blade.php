<div class="flex flex-col gap-6">
    <x-auth-header title="Create an account" description="Ingresa tus datos a continuación para crear tu cuenta" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="save">

        <div class="grid grid-cols-2 gap-y-6 gap-x-3">
            <!-- Name -->
            <div class=" col-span-2">
                <flux:input wire:model.live="name" id="name" label="{{ __('Name') }}:" type="text" name="name"
                    required autofocus autocomplete="name" placeholder="Full name" />
            </div class=" col-span-2">

            <!-- username -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model.live.debounce.1000ms="username" id="username" label="Username:" type="text"
                    name="Username" required placeholder="Nombre de usuario" />
            </div>

            <!-- Dni -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model.blur="dni" id="dni" label="Número de documento:" type="text"
                    name="dni" required placeholder="Número de documento" />
            </div>

            <!-- Email -->
            <div class="col-span-2">
                <flux:input wire:model.blur="email" id="email" label="{{ __('Email address') }}:" type="email"
                    name="email" required autocomplete="email" placeholder="email@example.com" />
            </div>

            <!-- Sexo -->
            <div class="col-span-2 sm:col-span-1">
                <flux:radio.group wire:model="sex" label="Sexo:">
                    <div class=" flex items-center pt-3 space-x-6">
                        <flux:radio value="male" label="Masculino" />
                        <flux:radio value="female" label="Femenino" />
                    </div>
                </flux:radio.group>
            </div>

            <!-- Fecha nacimiento -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model="birthdate" type="date" max="2999-12-31" label="Fecha nacimiento:" />
            </div>

            <!-- Teléfono -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model="phone" label="Teléfono:" type="text" name="phone" required
                    placeholder="Teléfono" />
            </div>

            <!-- Pais -->
            <div class="col-span-2 sm:col-span-1">
                <flux:select wire:model.live="selectedCountry" label="País:" placeholder="Seleccione un país...">

                    @foreach ($countries as $country)
                        <div wire:key="{{ $country->id }}">
                            <flux:select.option value="{{ $country['id'] }}">{{ $country['name'] }}</flux:select.option>
                        </div>
                    @endforeach

                </flux:select>
            </div>

            <!-- Departamento -->
            @if ($selectedCountry)
                <div class="col-span-2 sm:col-span-1">
                    <flux:select wire:model.live="selectedDepartment" label="Departamento:"
                        placeholder="Seleccione un departamento...">
                        @foreach ($departments as $department)
                            <div wire:key="{{ $department->id }}">
                                <flux:select.option value="{{ $department['id'] }}">{{ $department['name'] }}
                                </flux:select.option>
                            </div>
                        @endforeach
                    </flux:select>
                </div>

                <!-- ciudad -->
                @if ($selectedDepartment)
                    @if (count($cities) > 0)
                        <div class="col-span-2 sm:col-span-1">
                            <flux:select wire:model.live="selectedCity" label="Ciudad:"
                                placeholder="Seleccione una ciudad...">
                                @foreach ($cities as $city)
                                    <div wire:key="{{ $city->id }}">
                                        <flux:select.option value="{{ $city['id'] }}">{{ $city['name'] }}
                                        </flux:select.option>
                                    </div>
                                @endforeach
                            </flux:select>
                        </div>
                    @else
                        <!-- Ciudad -->
                        <div class="col-span-2 sm:col-span-1">
                            <flux:input wire:model="city" id="city" label="Ciudad:" type="text" name="city"
                                required autofocus autocomplete="city" placeholder="Ciudad" />
                        </div class=" col-span-2">

                    @endif
                @endif
            @endif
        </div>

        <div class="grid grid-cols-2 gap-y-6 gap-x-3 mt-6">
            <!-- Dirección -->
            <div class="col-span-2">
                <flux:input wire:model="address" id="Dirección" label="Dirección:" type="text" name="address"
                    autocomplete="off" placeholder="Dirección" />
            </div>

            <!-- sponsor -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model="sponsor" id="sponsor" disabled label="Sponsor:" type="text" name="sponsor"
                    placeholder="sponsor" />
            </div>

            <!-- sponsor -->
            <div class="col-span-2 sm:col-span-1">
                <flux:input wire:model="side" id="side" disabled label="Posición:" type="text"
                    name="side" placeholder="sider" />
            </div>


            <!-- Password -->
            <div class=" col-span-2">
                <flux:input wire:model.live.debounce.750ms="password" id="password" label="{{ __('Password') }}:"
                    type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            </div>

            <!-- Confirm Password -->
            <div class=" col-span-2">
                <flux:input wire:model.live.debounce.750ms="password_confirmation" id="password_confirmation"
                    label="{{ __('Confirm password') }}:" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm password" />
            </div>


            <div class="col-span-2 ">
                <flux:checkbox wire:model="terms" label="I agree to the terms and conditions" />
            </div>

            <div class=" col-span-2 flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full">
                    {{ __('Create account') }}
                </flux:button>
            </div>
        </div>

    </form>

    <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
        ¿Ya tienes una cuenta?
        <flux:link class="ml-1" href="{{ route('login') }}" wire:navigate> Iniciar sesión</flux:link>
    </div>


    <flux:modal wire:model.live="confirmingRegistration" :dismissible="false" class="md:w-3xl">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Confirmación de Registro</flux:heading>
                <flux:subheading>Tu cuenta ha sido creada exitosamente. Ahora puedes acceder a todas las funcionalidades
                    de nuestra
                    plataforma.</flux:subheading>
            </div>

            <p class="mt-4">
                Aquí tienes tus detalles de registro:
            </p>
            <ul class="mt-2 list-disc list-inside">
                <li><strong>Nombre de Usuario:</strong> {{ $username }}</li>
                <li><strong>Email:</strong> {{ $email }} </li>
            </ul>
            <flux:heading>Puedes empezar a explorar y utilizar nuestras funciones. Si tienes alguna pregunta o necesitas ayuda, no
                dudes en contactarnos.</flux:heading>

            <div class="flex">
                <flux:spacer />

                <div class=" space-x-2">
                    <flux:button wire:click="redirectToHome" type="button" variant="primary">Inicio</flux:button>
    
                    <flux:button x-on:click="$wire.confirmingRegistration = false">Cerrar</flux:button>
                </div>
            </div>
        </div>
    </flux:modal>
</div>

