<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => 1,
            'brand' => fake()->randomElement(['Toyota', 'BMW', 'Mercedes', 'Kia', 'Hyundai']),
            'model' => fake()->word(),
            'year' => fake()->numberBetween(2015, 2025),
            'color' => fake()->safeColorName(),

            'transmission' => fake()->randomElement(['automatic', 'manual']),
            'fuel_type' => fake()->randomElement(['gasoline', 'diesel', 'electric', 'hybrid']),

            'seats' => fake()->numberBetween(2, 7),
            'price_per_day' => fake()->randomFloat(2, 20, 200),

            'description' => fake()->sentence(),
            'main_image' => fake()->imageUrl(640, 480, 'cars'),

            'status' => 'available',
            'featured' => fake()->boolean(30),
        ];
    }
}
