<?php

namespace App\Livewire\Frontend;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Tarea;
use Livewire\WithFileUploads;

class GestionarTarea extends Component
{
    use WithFileUploads;
    
    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public $tarea;
    public $evidencia;
    public function mount(Tarea $tarea){
        $this->tarea = $tarea;
    }

    public function updateTarea()
    {

        dd($this->evidencia);

        $evidencia = time() . '-' . $this->evidencia->getClientOriginalName();

        $this->evidencia->storeAs('tareas',$evidencia,'public');

        Tarea::where('id',$this->tarea->id)->update(['evidencia'=>$evidencia]);
        

        $this->dispatch('evidencia-subida');
    }

    public function render()
    {
        return view('livewire.frontend.gestionar-tarea');
    }
}
