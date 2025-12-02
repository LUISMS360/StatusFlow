<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['nombre','descripcion','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
