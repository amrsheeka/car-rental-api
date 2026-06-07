<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $car_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Car $car
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarImages whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CarImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'image_url',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
