<?php

use App\Livewire\Frontend\Dashboard;
use App\Livewire\Frontend\Equip;
use App\Livewire\Frontend\GestionarEquipo;
use App\Livewire\Frontend\Tareas;
use Illuminate\Support\Facades\Route;


Route::get('/statusflow/dashboard',Dashboard::class)->name('home')->middleware('auth');
Route::get('/statusflow/equipos',Equip::class)->name('equipos')->middleware('auth');
Route::get('/statusflow/tareas',Tareas::class)->name('tareas')->middleware('auth');
Route::get('/statusflow/tareas/{equipo}',GestionarEquipo::class)->name('gestionar.equipo')->middleware('auth');
Route::view('/', 'welcome');
Route::view('/home','home')->name('home');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
