<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Livewire\Forms\EquipoForm;
use App\Models\User;
class Dashboard extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public EquipoForm $equipoForm;

    public function mount(){

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
