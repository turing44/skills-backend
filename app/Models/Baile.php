<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BaileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Baile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Baile extends Model
{
    /** @use HasFactory<\Database\Factories\BaileFactory> */
    use HasFactory;
    

    
}
