<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $name ?? 'StatusFlow' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="app-container">
            <aside class="sidebar">

                <div class="logo">
                    <i class="bi bi-lightning-charge-fill"></i> StatusFlow
                </div>

                <a href="#" class="menu-link">
                    <div class="menu-item"><i class="bi bi-house-fill"></i> Mi Espacio</div>
                </a>

                <a href="{{route('tareas')}}" wire:navigate class="menu-link">
                    <div class="menu-item"><i class="bi bi-list-check"></i> Mis Tareas</div>
                </a>

                <a href="{{route('equipos')}}" wire:navigate class="menu-link">
                    <div class="menu-item"><i class="bi bi-people-fill"></i> Equipo</div>
                </a>

                <!-- Activo -->
                <a href="{{route('home')}}" wire:navigate class="menu-link">
                    <div class="menu-item active"><i class="bi bi-pie-chart-fill"></i> Dashboard</div>
                </a>

                <div style="margin-top: auto; margin-bottom: 10px;">
                    <a href="#" class="menu-link" style="color:#ef4444;">
                        <div class="menu-item">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </div>
                    </a>
                </div>

                <div class="user-profile">
                    <div class="avatar-small" style="background:#ef4444;"></div>
                    <div>
                        <small>Modo Supervisor</small><br>
                        <strong>Admin</strong>
                    </div>
                </div>

            </aside>
            <main class="main-area">
                {{$slot}}   
            </main>
        </div>      
    </body>
</html>
