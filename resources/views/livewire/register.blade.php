<div class="flex flex-col gap-6">
    <x-auth-header title="Crear una cuenta" description="Ingresa tus datos a continuación para crear tu cuenta" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="save">

        <div class="grid grid-cols-2 gap-x-3">
            <!-- Name -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model="name" label="{{ __('Nombre') }}:" type="text" for="name" required autofocus
                    autocomplete="name" placeholder="Full name" />
            </div>

            <!-- Apellidos -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model="last_name" id="last_name" label="{{ __('Apellido') }}:" type="text"
                    for="last_name" required autofocus autocomplete="last_name" placeholder="Apellidos" />
            </div>

            <!-- username -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model.live.debounce.500ms="username" id="username" label="Username:" type="text"
                    for="username" required placeholder="Nombre de usuario" />
            </div>

            <!-- Dni -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model.blur="dni" id="dni" label="Número de documento:" type="text" for="dni"
                    required placeholder="Número de documento" />
            </div>

            <!-- Email -->
            <div class="col-span-2">
                <x-input wire:model.blur="email" id="email" label="{{ __('Email address') }}:" type="email"
                    for="email" required autocomplete="email" placeholder="email@example.com" />
            </div>

            <!-- Sexo -->
            <div class="col-span-2 sm:col-span-1">
                <x-radio class="" name="sex" label="Sexo:" wire:model="sex" :options="[['value' => 'male', 'label' => 'Masculino'], ['value' => 'female', 'label' => 'Femenino']]" />
            </div>

            <!-- Fecha nacimiento -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model="birthdate" type="date" max="2999-12-31" label="Fecha nacimiento:" />
            </div>

            <!-- Teléfono -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model.live="phone" label="Teléfono:" type="text" for="phone" required
                    placeholder="Teléfono" />
            </div>

            <!-- Pais -->
            <div class="col-span-2 sm:col-span-1">
                <x-select wire:model.live="selectedCountry" label="País:" for="selectedCountry"
                    placeholder="Seleccione un país..." :options="$countries" required />
            </div>


            <!-- Departamento -->
            @if ($selectedCountry)

                <div class="col-span-2 sm:col-span-1">
                    <x-select wire:model.live="selectedDepartment" label="Departamento:" for="selectedDepartment"
                        placeholder="Seleccione un departamento..." :options="$departments" />
                </div>


                <!-- ciudad -->
                @if ($selectedDepartment)
                    @if (count($cities) > 0)
                        <div class="col-span-2 sm:col-span-1">
                            <x-select wire:model.live="selectedCity" label="Ciudad:" for="selectedCity"
                                placeholder="Seleccione una ciudad..." :options="$cities" />
                        </div>
                    @else
                        <!-- Ciudad -->
                        <div class="col-span-2 sm:col-span-1">
                            <x-input wire:model="city" id="city" label="Ciudad:" type="text" for="city"
                                required autofocus autocomplete="city" placeholder="Ciudad" />
                        </div>
                    @endif
                @endif
            @endif
        </div>

        <div class="grid grid-cols-2 gap-x-3  ">
            <!-- Dirección -->
            <div class="col-span-2">
                <x-input wire:model="address" id="Dirección" label="Dirección:" type="text" for="address"
                    autocomplete="off" placeholder="Dirección" />
            </div>

            <!-- sponsor -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model="sponsor" id="sponsor" disabled label="Sponsor:" type="text" for="sponsor"
                    placeholder="sponsor" />
            </div>

            <!-- sponsor -->
            <div class="col-span-2 sm:col-span-1">
                <x-input wire:model="side" id="side" disabled label="Posición:" type="text" for="side"
                    placeholder="sider" />
            </div>

            <!-- Password -->
            <div class=" col-span-2">
                <x-input wire:model.live.debounce.750ms="password" id="password" label="{{ __('Password') }}:"
                    type="password" for="password" required autocomplete="new-password" placeholder="Password" />
            </div>

            <!-- Confirm Password -->
            <div class=" col-span-2">
                <x-input wire:model.live.debounce.750ms="password_confirmation" id="password_confirmation"
                    label="{{ __('Confirm password') }}:" type="password" for="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm password" />
            </div>

            <div class="col-span-2 ">
                @include('terms-And-Conditions')

            </div>


            <div class=" col-span-2 flex items-center justify-end mt-5">
                <flux:button type="submit" variant="primary" class="w-full">
                    Crear una cuenta
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
                <flux:heading class=" text-primary!" size="lg">Confirmación de Registro</flux:heading>
                <flux:subheading class=" text-ink!">Tu cuenta ha sido creada exitosamente. Ahora puedes acceder a todas
                    las funcionalidades
                    de nuestra
                    plataforma.</flux:subheading>
            </div>

            <p class="mt-4 text-primary">
                Aquí tienes tus detalles de registro:
            </p>
            <ul class="mt-2 list-disc list-inside text-ink">
                <li><strong>Nombre de Usuario:</strong> {{ $username }}</li>
                <li><strong>Email:</strong> {{ $email }} </li>
            </ul>
            <flux:heading class=" text-primary!">Puedes empezar a explorar y utilizar nuestras funciones. Si tienes
                alguna pregunta o necesitas
                ayuda, no
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


    <script>
        // Selecciona el campo de entrada
        var usernameInput = document.getElementById('username');

        // Añade un evento 'input' para eliminar espacios en tiempo real
        usernameInput.addEventListener('input', function() {
            this.value = this.value.replace(/\s+/g, '');
        });
    </script>
</div>
