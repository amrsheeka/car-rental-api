<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Brand::insert([
            [
                'name' => 'Chevrolet',
                'logo' => 'brands/chevrolet.png',
            ],
            [
                'name' => 'Ford',
                'logo' => 'brands/ford.png',
            ],
            [
                'name' => 'Honda',
                'logo' => 'brands/honda.png',
            ],
            [
                'name' => 'Jeep',
                'logo' => 'brands/jeep.png',
            ],
            [
                'name' => 'Mercedes-Benz',
                'logo' => 'brands/mercedes-benz.png',
            ],
            [
                'name' => 'Nissan',
                'logo' => 'brands/nissan.png',
            ],
            [
                'name' => 'Toyota',
                'logo' => 'brands/toyota.png',
            ],
        ]);
        
        Branch::factory(5)->create();

        Car::factory(10)->create();

        User::factory(10)->create();

        Booking::factory(15)->create();

        
    }
}
