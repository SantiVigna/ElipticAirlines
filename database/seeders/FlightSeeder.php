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
                'departure_time' => '01/02/2023',
                'arrival_time' => '01/02/2023',
                'distance' => 620,
                'price' => 50,
            ],
            [
                'flight_number' => 'ES-B32',
                'departure' => 'Barcelona',
                'arrival' => 'Paris',
                'departure_time' => '03/02/2023',
                'arrival_time' => '03/02/2023',
                'distance' => 1035,
                'price' => 120,
            ],
            [
                'flight_number' => 'FR-C45',
                'departure' => 'Paris',
                'arrival' => 'Rome',
                'departure_time' => '05/02/2023',
                'arrival_time' => '05/02/2023',
                'distance' => 1105,
                'price' => 150,
            ],
            [
                'flight_number' => 'IT-D56',
                'departure' => 'Rome',
                'arrival' => 'Berlin',
                'departure_time' => '07/02/2023',
                'arrival_time' => '07/02/2023',
                'distance' => 1180,
                'price' => 180,
            ],
            [
                'flight_number' => 'GR-E67',
                'departure' => 'Berlin',
                'arrival' => 'London',
                'departure_time' => '09/02/2023',
                'arrival_time' => '09/02/2023',
                'distance' => 930,
                'price' => 100,
            ],
            [
                'flight_number' => 'UK-F78',
                'departure' => 'London',
                'arrival' => 'Amsterdam',
                'departure_time' => '11/02/2023',
                'arrival_time' => '11/02/2023',
                'distance' => 360,
                'price' => 80,
            ],
            [
                'flight_number' => 'NT-G89',
                'departure' => 'Amsterdam',
                'arrival' => 'Madrid',
                'departure_time' => '13/02/2023',
                'arrival_time' => '13/02/2023',
                'distance' => 1480,
                'price' => 700,
            ],
            [
                'flight_number' => 'US-H90',
                'departure' => 'New York',
                'arrival' => 'Los Angeles',
                'departure_time' => '15/02/2023',
                'arrival_time' => '15/02/2023',
                'distance' => 4500,
                'price' => 800,
            ],
            [
                'flight_number' => 'AU-I01',
                'departure' => 'Sydney',
                'arrival' => 'Tokyo',
                'departure_time' => '17/02/2023',
                'arrival_time' => '18/02/2023',
                'distance' => 7800,
                'price' => 900,
            ],
            [
                'flight_number' => 'BR-J12',
                'departure' => 'Sao Paulo',
                'arrival' => 'Beijing',
                'departure_time' => '19/02/2023',
                'arrival_time' => '20/02/2023',
                'distance' => 17800,
                'price' => 1000,
            ]
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}
