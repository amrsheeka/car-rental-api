<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CarImageSeeder extends Seeder
{
    public function run(): void
    {
        $carsPath = storage_path('app/public/cars');

        foreach (Car::all() as $car) {

            $carFolder = $carsPath . '/' . $car->id;

            if (! File::exists($carFolder)) {
                continue;
            }

            $files = File::files($carFolder);

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            foreach ($files as $index => $file) {

                if (in_array(strtolower($file->getExtension()), $allowedExtensions)) {

                    CarImage::create([
                        'car_id' => $car->id,
                        'image' => 'cars/' . $car->id . '/' . $file->getFilename(),
                        'is_main' => $index === 0,
                    ]);
                }
            }
        }
    }
}
