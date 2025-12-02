<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;

class EquipoForm extends Form
{

    #[Validate]
    public $nombre;

    #[Validate]
    public $descripcion;

    #[Validate]
    public $user_id;

    public function rules(){
        return [
            'nombre'=> 'required|string|max:100|unique:equipos,nombre',
            'descripcion'=>'required|string|max:255',
        ];
    }
    public function save(){
        $this->validate();
        Equipo::create(['nombre'=>$this->nombre,'descripcion'=>$this->descripcion,'user_id'=>Auth::user()->id]);
        $this->reset();
    }

}
