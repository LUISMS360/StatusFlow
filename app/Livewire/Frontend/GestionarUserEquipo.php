<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GestionarUserEquipo extends Component
{
    #[Layout('layouts.app')]
    #[Title('Gestionar Usuario')]

    public $usuario;

    public function mount(User $usuario){
        $this->usuario = $usuario;
    }
    public function render()
    {
        return view('livewire.frontend.gestionar-user-equipo');
    }
}
