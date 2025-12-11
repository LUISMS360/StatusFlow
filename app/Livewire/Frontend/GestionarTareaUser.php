<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use App\Models\Tarea;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GestionarTareaUser extends Component
{
    #[Layout('layouts.app')]
    #[Title('Gestionar Tarea ')]
    public $tarea; 

    public $usuario; 
    public $equipo;

    public function mount(Tarea $tarea,User $usuario, Equipo $equipo){
        $this->tarea = $tarea;
        $this->usuario = $usuario; 
        $this->equipo = $equipo;
    }

    public function render()
    {
        return view('livewire.frontend.gestionar-tarea-user');
    }
}
