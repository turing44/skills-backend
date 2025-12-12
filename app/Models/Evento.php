<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /** @use HasFactory<\Database\Factories\EventoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'creador_id',
        'precio',
        'fecha',
    ];


    public function creador() {
        return $this->belongsTo(User::class, 'creador_id');
    }
}
