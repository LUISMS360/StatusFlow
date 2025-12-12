<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Tarea;
use Illuminate\Support\Facades\DB;

class GestionarUserEquipo extends Component
{
    #[Layout('layouts.app')]
    #[Title('Gestionar Usuario')]

    public $usuario;
    public $equipo; 

    public $nombreTarea;
    public $descripcionTarea;
    public $pendientes; 
    public $completas;

    public $estado;
    public $totales;
    public $mensaje;
    public $tareaIdSeleccionada;

  public function mount(Equipo $equipo, User $usuario)
{
    $this->equipo = $equipo;
    $this->usuario = $usuario;

    $this->totales = DB::table('users as u')
        ->join('tareas as t', 't.user_id', '=', 'u.id')
        ->where('u.id', $this->usuario->id)
        ->where('t.equipo_id', $this->equipo->id)
        ->value(DB::raw('count(t.id)'));

    $this->pendientes = DB::table('users as u')
        ->join('tareas as t', 't.user_id', '=', 'u.id')
        ->where('t.estado', 0)
        ->where('u.id', $this->usuario->id)
        ->where('t.equipo_id', $this->equipo->id)
        ->value(DB::raw('count(t.id)'));

    $this->completas = DB::table('users as u')
        ->join('tareas as t', 't.user_id', '=', 'u.id')
        ->where('t.estado', 1)
        ->where('u.id', $this->usuario->id)
        ->where('t.equipo_id', $this->equipo->id)
        ->value(DB::raw('count(t.id)'));
}
    
    public function abrirModalValidacion($id)
    {
        $this->tareaIdSeleccionada = $id;
        
    }

    public function asignarTarea(){
        Tarea::create([
            'nombre'=> $this->nombreTarea, 
            'descripcion'=>$this->descripcionTarea,
            'user_id'=>$this->usuario->id,
            'equipo_id'=>$this->equipo->id
        ]);
        $this->reset('nombreTarea', 'descripcionTarea');
        $this->dispatch('tarea-asignada');
    }

    public function designarTarea($id){
        Tarea::where('id',$id)
        ->where('user_id',$this->usuario->id)
        ->where('equipo_id',$this->equipo->id)
        ->delete();
        $this->dispatch('tarea-eliminada');    
    }

    public function validar(){
       Tarea::where('id', $this->tareaIdSeleccionada)
        ->where('user_id',$this->usuario->id)
        ->where('equipo_id',$this->equipo->id)
        ->update([
            'confirmacion'=>1,
            'mensaje'=>$this->mensaje
        ]);

    $this->dispatch('validacion');
    }
    public function eliminar(){

        //Elimnar al usuario del grupo
        DB::table('user_equipos')->where('user_id',$this->usuario->id)
        ->where('equipo_id',$this->equipo->id)->delete();

        //Elinando todas sustareas relaciondas
        DB::table('tareas')->where('user_id',$this->usuario->id)
        ->where('equipo_id',$this->equipo->id)->delete(); 
        
        $this->redirect('/statusflow/equipo/'.$this->equipo->id);
    }

    public function cambiarEstado(){
        Tarea::where('user_id',$this->usuario->id)
        ->where('equipo_id',$this->equipo->id)->update(
            ['activo'=>$this->estado]
        );
        $this->dispatch('estado-actualizado');
    }
    public function render()
    {
        $tareas = Tarea::where('user_id',$this->usuario->id)
                  ->where('equipo_id',$this->equipo->id)->get();
        return view('livewire.frontend.gestionar-user-equipo',['tareas'=>$tareas]);
    }
}
