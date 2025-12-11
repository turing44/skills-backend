<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido_1
 * @property string|null $apellido_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ConsejeroFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereApellido1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereApellido2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Consejero whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Consejero extends Model
{
    /** @use HasFactory<\Database\Factories\ConsejeroFactory> */
    use HasFactory;

    

    public function municipio() {
        return $this->belongsTo(Municipio::class);
    }
}
