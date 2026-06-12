<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $branch_id
 * @property int $brand_id
 * @property string $model
 * @property string $year
 * @property string|null $color
 * @property string $transmission
 * @property string $fuel_type
 * @property int $seats
 * @property numeric $price_per_day
 * @property string|null $description
 * @property string|null $main_image
 * @property string $status
 * @property int $featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Branch $branch
 * @property-read \App\Models\Brand $brand
 * @method static \Database\Factories\CarFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car wherePricePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Car whereYear($value)
 * @mixin \Eloquent
 */
class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'make',
        'model',
        'year',
        'license_plate',
        'status',
        'branch_id',
        'brand_id'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    public function primaryImage()
    {
        return $this->hasOne(CarImage::class)
            ->where('is_main', true);
    }
}
