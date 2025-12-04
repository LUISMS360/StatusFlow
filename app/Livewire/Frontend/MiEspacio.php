<?php

namespace App\Livewire\Frontend;

use App\Livewire\Forms\FormUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MiEspacio extends Component
{
    #[Layout('layouts.app')]
    #[Title('Mi Espacio')]

    public FormUser $usuarioForm;

    public $usuario;

    public function mount(){
        $this->usuario = User::where('id',Auth::user()->id)->first();
    }

    public function updateInfo(){
        $this->usuarioForm->save();
        $this->dispatch('info-updated');
    }
    public function render()
    {
        return view('livewire.frontend.mi-espacio');
    }
}
