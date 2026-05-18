<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('+1 days', '+10 days');
        $end = fake()->dateTimeBetween('+11 days', '+20 days');
        return [
            'user_id' => 1,
            'car_id' => 1,
            'pickup_branch_id' => 1,
            'return_branch_id' => 1,

            'start_date' => $start,
            'end_date' => $end,

            'total_days' => fake()->numberBetween(1, 10),
            'total_price' => fake()->randomFloat(2, 100, 1000),

            'status' => fake()->randomElement([
                'pending',
                'confirmed',
                'cancelled',
                'completed'
            ]),

            'payment_status' => fake()->randomElement([
                'unpaid',
                'paid',
                'refunded'
            ]),

            'notes' => fake()->sentence(),
        ];
    }
}
