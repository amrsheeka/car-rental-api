<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => 1,
            'amount' => fake()->randomFloat(2, 100, 1000),

            'payment_method' => fake()->randomElement([
                'card',
                'cash',
                'wallet'
            ]),

            'transaction_id' => fake()->uuid(),

            'status' => fake()->randomElement([
                'pending',
                'paid',
                'failed'
            ]),

            'paid_at' => now(),
        ];
    }
}
