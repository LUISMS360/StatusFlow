<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class GestionarEquipo extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]


    public $equipo;
    public $usuario;

    public function agregarUsuario(){

    }
    public function mount(Equipo $equipo){
        $this->equipo = $equipo;
    }
    public function render()
    {
        $usuarios = User::select('id','name','email')->where('name',$this->usuario)->get();
        return view('livewire.frontend.gestionar-equipo',['usuarios'=>$usuarios]);
    }
}
