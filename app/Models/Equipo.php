<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipo extends Model
{
    protected $fillable = ['nombre','descripcion','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userper(){
        return $this->belongsToMany(User::class,'user_equipos');
    }

    public function tareas(): HasMany{  
        return $this->hasMany(Tarea::class);
    }
}
