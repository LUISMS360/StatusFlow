<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    protected  $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'user_id',
        'equipo_id',
        'evidencia'
    ];


    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function equipo():BelongsTo{
        return $this->belongsTo(Equipo::class);
    }
}
