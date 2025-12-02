<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.layoutbs5')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));
        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="login-bg">
    <div class="login-container">

        <h1>Crear Cuenta</h1>
        <p>Completa los datos para continuar</p>

        <form wire:submit="register">

            <!-- Nombre -->
            <input 
                type="text" 
                wire:model="name" 
                class="input-login" 
                placeholder="Nombre completo" 
                required 
                autofocus
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

            <!-- Email -->
            <input 
                type="email" 
                wire:model="email" 
                class="input-login" 
                placeholder="Correo electrónico"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

            <!-- Password -->
            <input 
                type="password" 
                wire:model="password" 
                class="input-login" 
                placeholder="Contraseña"
                required
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

            <!-- Confirm password -->
            <input 
                type="password" 
                wire:model="password_confirmation" 
                class="input-login" 
                placeholder="Confirmar contraseña"
                required
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />

            <button class="btn-login">
                Crear cuenta
            </button>
        </form>

        <a href="{{ route('login') }}" wire:navigate class="d-block mt-3">
            ¿Ya tienes una cuenta? Inicia sesión
        </a>

        <span class="version-tag">v1.0.0</span>
    </div>
</div>
