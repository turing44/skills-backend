<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $ciudadano_id
 * @property int $municipio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CensoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo whereCiudadanoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo whereMunicipioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Censo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Censo extends Model
{
    /** @use HasFactory<\Database\Factories\CensoFactory> */
    use HasFactory;
}
