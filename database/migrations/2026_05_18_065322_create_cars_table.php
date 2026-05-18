<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('branch_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('brand')->index();
            $table->string('model');

            $table->year('year');

            $table->string('color')->nullable();

            $table->enum('transmission', [
                'automatic',
                'manual'
            ]);

            $table->enum('fuel_type', [
                'gasoline',
                'diesel',
                'electric',
                'hybrid'
            ]);

            $table->integer('seats');

            $table->decimal('price_per_day', 10, 2)->index();

            $table->text('description')->nullable();

            $table->string('main_image')->nullable();

            $table->enum('status', [
                'available',
                'rented',
                'maintenance'
            ])->default('available')->index();

            $table->boolean('featured')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
