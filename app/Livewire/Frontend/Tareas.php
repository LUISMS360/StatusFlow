<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Tareas extends Component
{
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public function render()
    {
        $tareas = Auth::user()->tareas()->paginate(10);
        return view('livewire.frontend.tareas',['tareas'=>$tareas]);
    }

    
}
