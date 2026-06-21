<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    protected $fillable = [
        'car_id',
        'image_path',
        'image',
        'is_main',
    ];
    protected $appends = ['image_url'];
    protected $hidden = ['image'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset(Storage::url($this->image))
            : null;
    }
    // public function setImageAttribute($value)
    // {
    //     if ($value) {
    //         $this->attributes['image'] = $value->store('car_images', 'public');
    //     }
    // }
    // public function delete()
    // {
    //     if ($this->image) {
    //         Storage::disk('public')->delete($this->image);
    //     }
    //     parent::delete();
    // }
}
