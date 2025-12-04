<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class FormUser extends Form
{

    use WithFileUploads;

    public ?User $user;
    #[Validate]
    public $name; 

    #[Validate]
    public $email; 

    #[Validate]
    public $password; 

    #[Validate]
    public $foto;

    public function rules(){
        return [
            'name'=>'required|string|max:100',
            'email'=>'required|email:rfc,dns|unique:users,email',
            'password'=>'required|min:8',
            'foto'=>'required|image',
        ];
    }

    public function save(){
       
       $foto = time() . '.' . $this->foto->getClientOriginalExtension();


       Storage::disk('public')->putFileAs('users',$this->foto,$foto);

       User::where('id',Auth::user()->id)->update([
        "name"=>$this->name,
        "email"=>$this->email,
        "password"=>$this->password,
        "foto"=>$foto,
       ]);
       $this->reset();
    }
}
