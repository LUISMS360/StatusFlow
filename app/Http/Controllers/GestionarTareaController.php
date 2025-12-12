<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class GestionarTareaController extends Controller
{
    public Tarea $tarea;
    public function __construct()
    {

    }

    public function index(Tarea $tarea){
        return view('gestionarTarea',['tarea'=>$tarea]);
    }
   public function subirTarea(Request $request){

        $request->validate(['evidencia'=>'required|file']);

        $nombreArchivo = time() . '-' . $request->file('evidencia')->getClientOriginalName();

        $tareaId = $request->input('tarea');

        // Actualiza la tarea
        Tarea::where('id', $tareaId)->update([
            'estado' => 1,
            'evidencia' => $nombreArchivo
        ]);

        // Guarda la evidencia
        $request->file('evidencia')->storeAs('tareas', $nombreArchivo, 'public');

        return redirect()->back()->with('success', 'Evidencia subida con éxito');
    }

}
