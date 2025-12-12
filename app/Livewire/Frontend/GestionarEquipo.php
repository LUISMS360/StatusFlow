<?php

namespace App\Livewire\Frontend;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarEquipo extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    #[Title('Dashboard')]

    public $equipo;
    public $usuario;

    public function mount(Equipo $equipo)
    {
        $this->equipo = $equipo;
    }

    // Recargar la tabla luego de agregar un usuario
    public function agregarUsuario($userid, $equipoid)
    {
        if(DB::table('user_equipos')->where('user_id',$userid)
            ->where('equipo_id',$equipoid)
            ->exists()){
                
            $this->dispatch('exists');
        }else{
            DB::table('user_equipos')->insert([
                'user_id'  => $userid,
                'equipo_id'=> $equipoid
            ]);

            // Recargar solo la paginación
            $this->resetPage();

            $this->dispatch('add-user');
        }        
    }

    public function render()
    {
        $equipoUsers = DB::table('user_equipos as ue')
            ->select(
                'u.id as id',
                'u.name as nombre',
                'u.email as email',
                'u.rol as rol',
                'activo',
                'u.foto as foto',
                'ue.created_at as incorporacion'
            )
            ->join('users as u', 'u.id', '=', 'ue.user_id')
            ->where('equipo_id', $this->equipo->id)
            ->paginate(10);

        // Búsqueda de usuarios
        $usuarios = User::select('id','name','email','foto')
            ->where('name', $this->usuario)
            ->get();

        return view('livewire.frontend.gestionar-equipo', [
            'usuarios'     => $usuarios,
            'equipoUsers'  => $equipoUsers,
        ]);
    }
}
