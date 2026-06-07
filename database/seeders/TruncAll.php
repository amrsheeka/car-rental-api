<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncAll extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('branches')->truncate();
        DB::table('cars')->truncate();
        DB::table('users')->truncate();
        DB::table('bookings')->truncate();
        DB::table('brands')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
