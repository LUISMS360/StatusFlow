<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiEspacioController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('miespacio',['usuario'=>$user]);
    }
    public function store(Request $request)  
    {        
        if ($request->hasFile('foto')) {
            $foto = time().'-'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('perfiles', $foto, 'public');        

            User::where('id', Auth::user()->id)
                ->update([
                    'name'  => $request->name,
                    'email' => $request->email,
                    'foto'  => $foto
                ]);

            return redirect()->back()->with('success', 'Perfil actualizado correctamente');
        }

        User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

        return redirect()->back()->with('success', 'Datos actualizados correctamente');
    }

}
