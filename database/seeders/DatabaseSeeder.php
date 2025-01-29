<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\FlightSeeder;
use Database\Seeders\AirplaneSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AirplaneSeeder::class,
            FlightSeeder::class,
        ]);
    }
}
