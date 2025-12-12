<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Tareas extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public $completas;

    public $estado;
    public $totales;
    public $pendientes;

    public function mount(){
         $this->totales = DB::table('users as u')
            ->join('tareas as t', 't.user_id', '=', 'u.id')
            ->where('u.id', Auth::user()->id)
            ->value(DB::raw('count(t.id)'));

        $this->pendientes = DB::table('users as u')
            ->join('tareas as t', 't.user_id', '=', 'u.id')
            ->where('t.estado', 0)
            ->where('u.id', Auth::user()->id)
            ->value(DB::raw('count(t.id)'));

        $this->completas = DB::table('users as u')
            ->join('tareas as t', 't.user_id', '=', 'u.id')
            ->where('t.estado', 1)
            ->where('u.id', Auth::user()->id)
            ->value(DB::raw('count(t.id)'));
    }
    public function render()
    {
        $tareas = Auth::user()->tareas()->paginate(10);
        return view('livewire.frontend.tareas',['tareas'=>$tareas]);
    }

    
}
