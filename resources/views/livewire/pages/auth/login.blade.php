<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.layoutbs5')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>


<div class="login-bg">
    <div class="login-container">
       <h1 class="logo" style="color: #1e293b; justify-content: center; margin-bottom: 10px;">
            <i class="bi bi-lightning-charge-fill" style="color: #4f46e5;"></i> StatusFlow
        </h1>

        <p style="color:#64748b; margin-bottom: 20px;">Accede a tu panel de control</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login">

            <!-- Email -->
            <input
                wire:model="form.email"
                type="email"
                class="input-login form-control mb-2"
                placeholder="Correo electrónico"
                required
                autofocus
            >
            <x-input-error :messages="$errors->get('form.email')" class="mt-1" />

            <!-- Password -->
            <input
                wire:model="form.password"
                type="password"
                class="input-login form-control mb-2"
                placeholder="Contraseña"
                required
            >
            <x-input-error :messages="$errors->get('form.password')" class="mt-1" />

            <!-- Remember me -->
            <div class="text-start mb-3">
                <label style="font-size: 0.9rem; color:#64748b;">
                    <input type="checkbox" wire:model="form.remember">
                    Recordarme
                </label>
            </div>

            <!-- Forgot password -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate style="font-size:0.9rem; display:block; margin-bottom:15px;">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <!-- Botón login -->
            <button type="submit" class="btn-login">
                Entrar
            </button>
        </form>

        <span class="version-tag" style="display:block; margin-top:15px; font-size:0.8rem; color:#94a3b8;">
            v1.0.0
        </span>

    </div>
</div>
