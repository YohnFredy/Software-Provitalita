<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status','Se enviará un enlace de restablecimiento si la cuenta existe.');
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Has olvidado tu contraseña" description="Ingresa tu correo electrónico para recibir un enlace de restablecimiento de contraseña" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->



        <x-input wire:model="email" id="email" label="{{ __('Email address') }}:" for="email" type="email" name="email" required autofocus placeholder="email@example.com" />

        <flux:button variant="primary" type="submit" class="w-full">Enlace de restablecimiento </flux:button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        O bien, volver al
        <flux:link :href="route('login')" wire:navigate>inicio de sesión</flux:link>
    </div>
</div>
