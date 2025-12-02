<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Equip extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public $equipos;
    public function mount(){
        $this->equipos = Equipo::with('user')->where('user_id',Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.equip');
    }
}
