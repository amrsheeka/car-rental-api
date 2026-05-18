<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCoupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'coupon_code',
        'discount_amount',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
