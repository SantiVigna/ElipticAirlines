<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
            [
                'flight_number' => 'ES-A19',
                'departure' => 'Madrid',
                'arrival' => 'Barcelona',
                'departure_time' => '2025-02-01',
                'arrival_time' => '2025-02-01',
                'distance' => 620,
                'price' => 50,
                'airplane_id' => 8,
            ],
            [
                'flight_number' => 'ES-B32',
                'departure' => 'Barcelona',
                'arrival' => 'Paris',
                'departure_time' => '2025-06-06',
                'arrival_time' => '2025-06-06',
                'distance' => 1035,
                'price' => 120,
                'airplane_id' => 9,
            ],
            [
                'flight_number' => 'FR-C45',
                'departure' => 'Paris',
                'arrival' => 'Rome',
                'departure_time' => '2025-06-10',
                'arrival_time' => '2025-06-10',
                'distance' => 1105,
                'price' => 150,
                'airplane_id' => 6,
            ],
            [
                'flight_number' => 'IT-D56',
                'departure' => 'Rome',
                'arrival' => 'Berlin',
                'departure_time' => '2025-06-15',
                'arrival_time' => '2025-06-15',
                'distance' => 1180,
                'price' => 180,
                'airplane_id' => 3,
            ],
            [
                'flight_number' => 'GR-E67',
                'departure' => 'Berlin',
                'arrival' => 'London',
                'departure_time' => '2025-06-20',
                'arrival_time' => '2025-06-20',
                'distance' => 930,
                'price' => 100,
                'airplane_id' => 2,
            ],
            [
                'flight_number' => 'UK-F78',
                'departure' => 'London',
                'arrival' => 'Amsterdam',
                'departure_time' => '2025-06-25',
                'arrival_time' => '2025-06-25',
                'distance' => 360,
                'price' => 80,
                'airplane_id' => 2,
            ],
            [
                'flight_number' => 'NT-G89',
                'departure' => 'Amsterdam',
                'arrival' => 'Madrid',
                'departure_time' => '2025-06-30',
                'arrival_time' => '2025-06-30',
                'distance' => 1480,
                'price' => 700,
                'airplane_id' => 3,
            ],
            [
                'flight_number' => 'US-H90',
                'departure' => 'New York',
                'arrival' => 'Los Angeles',
                'departure_time' => '2025-07-05',
                'arrival_time' => '2025-07-05',
                'distance' => 4500,
                'price' => 800,
                'airplane_id' => 4,
            ],
            [
                'flight_number' => 'AU-I01',
                'departure' => 'Sydney',
                'arrival' => 'Tokyo',
                'departure_time' => '2025-07-10',
                'arrival_time' => '2025-07-11',
                'distance' => 7800,
                'price' => 900,
                'airplane_id' => 13,
            ],
            [
                'flight_number' => 'BR-J12',
                'departure' => 'Sao Paulo',
                'arrival' => 'Beijing',
                'departure_time' => '2025-07-15',
                'arrival_time' => '2025-07-16',
                'distance' => 13800,
                'price' => 1000,
                'airplane_id' => 14,
            ]
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}
