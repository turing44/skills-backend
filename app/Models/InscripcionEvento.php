<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InscripcionEvento extends Model
{
    protected $table = "inscripciones_eventos";

    protected $fillable = [
        "user_id",
        "evento_id",
        "fecha_alta",
        "fecha_baja",
    ];


}
