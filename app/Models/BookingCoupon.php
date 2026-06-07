<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $booking_id
 * @property int $coupon_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Booking $booking
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BookingCoupon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
