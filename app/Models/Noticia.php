<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NoticiaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Noticia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Noticia extends Model
{
    /** @use HasFactory<\Database\Factories\NoticiaFactory> */
    use HasFactory;

    protected $fillable = [
        'titular',
        'cuerpo',
        'calificacion',
        'creador_id',
        'municipio_id',
        'fecha',
    ];

    public function creador() {
        return $this->belongsTo(User::class, 'creador_id');
    }

    
}
