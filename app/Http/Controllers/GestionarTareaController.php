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
        $tarea = time().'-'.$request->file('evidencia')->getClientOriginalName();
        $tareaId = $request->input('tarea');
        Tarea::where('id',$tareaId)->update(['estado'=>1,'evidencia'=>$tarea]);
        $request->file('evidencia')->storeAs('tareas',$tarea,'public');
        return redirect()->back()->with('success');
    }
}
