<?php

use App\Livewire\Frontend\Dashboard;
use App\Livewire\Frontend\Equip;
use App\Livewire\Frontend\GestionarEquipo;
use App\Livewire\Frontend\GestionarTareaUser;
use App\Livewire\Frontend\GestionarUserEquipo;
use App\Livewire\Frontend\MiEspacio;
use App\Livewire\Frontend\Tareas;
use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\GestionarTarea;
use App\Http\Controllers\GestionarTareaController;
use App\Http\Controllers\MiEspacioController;

Route::get('/statusflow/dashboard',Dashboard::class)->name('home')->middleware('auth');
Route::get('/statusflow/equipos',Equip::class)->name('equipos')->middleware('auth');
Route::get('/statusflow/tareas',Tareas::class)->name('tareas')->middleware('auth');
Route::get('/statusflow/equipo/{equipo}',GestionarEquipo::class)->name('gestionar.equipo')->middleware('auth');
Route::get('/statusflow/asignar-tarea/equipo/{equipo}/usuario/{usuario}',GestionarUserEquipo::class)->name('user.asignar.tarea')->middleware('auth');
Route::get('/statusflow/gestionar-tarea/equipo/{equipo}/usuario/{usuario}/tarea/{tarea}',
GestionarTareaUser::class)->name('gestionar.tarea.user');
Route::get('/statusflow/tarea/{tarea}',[GestionarTareaController::class,'index'])->name('gestionar.tarea.view');
Route::post('/statusflow/tarea',[GestionarTareaController::class,'subirTarea'])->name('gestionar.tarea');
Route::get('/statusflow/mi-espacio',[MiEspacioController::class,'index'])->name('mi.espacio');
Route::post('/statusflow/mi-espacio',[MiEspacioController::class,'store'])->name('mi.espacio.update');


Route::view('/home','home')->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
