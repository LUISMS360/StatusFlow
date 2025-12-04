<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Equip extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public $equipos;
    public $equiposAdd;

    public function mount(){
        $this->equipos = Equipo::with('user')->where('user_id',Auth::user()->id)->get();
        $this->equiposAdd = DB::table('user_equipos as ue')->select('e.nombre as equipo','ue.created_at as incorporacion',
        'ue.activo as estado')->join('users as u','u.id','=','ue.user_id')->join('equipos as e','e.id','=','ue.equipo_id')
        ->where('ue.user_id',Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.equip');
    }
}
