<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportNavigate\SupportNavigate;

class Lagout extends Component
{
    public function logout(){
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirect('/login',navigate:true);
    }
    public function render()
    {
        return view('livewire.lagout');
    }
}
