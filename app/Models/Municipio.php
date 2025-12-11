<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $alcalde_id
 * @property int $admin_id
 * @property string $poblacion_verano
 * @property string $poblacion_fiestas
 * @property string $poblacion_censada
 * @method static \Database\Factories\MunicipioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio whereAlcaldeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio wherePoblacionCensada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio wherePoblacionFiestas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio wherePoblacionVerano($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Municipio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Municipio extends Model
{
    /** @use HasFactory<\Database\Factories\MunicipioFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'alcalde_id',
        'admin_id',
        'poblacion_verano',
        'poblacion_fiestas',
        'poblacion_censada',
    ];

    public function ciudadanos() {
        return $this->hasMany(User::class);
    }

    public function consejeros() {
        return $this->hasMany(Consejero::class);
    }

    public function alcalde() {
        return $this->belongsTo(User::class);
    }
}
