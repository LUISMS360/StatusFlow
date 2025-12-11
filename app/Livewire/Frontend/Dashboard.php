<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Livewire\Forms\EquipoForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public EquipoForm $equipoForm;
    public $equipos;
    public $tareas;

    public function mount(){
        $this->equipos = User::find(Auth::user()->id)->equiposper()->count();
        $this->tareas = User::find(Auth::user()->id)->tareas()->count();
    }
    public function crearEquipo(){
        $this->equipoForm->save();
        $this->dispatch('create-equipo');
    }

    public function render()
    {
       
        return view('livewire.frontend.dashboard');
    }
}
