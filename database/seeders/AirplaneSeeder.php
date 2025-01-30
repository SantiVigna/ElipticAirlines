<?php

namespace Database\Seeders;

use App\Models\Airplane;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AirplaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airplanes = [
            [
                'registration' => 'ES-A19',
                'model' => 'Boeing 737',
                'capacity' => 130,
                'autonomy' => 3000,
                'image' => 'boeing_737.jpg',
            ],
            [
                'registration' => 'ES-B32',
                'model' => 'Airbus A320',
                'capacity' => 40,
                'autonomy' => 1000,
                'image' => 'airbus_a320.jpg',
            ],
            [
                'registration' => 'ES-C45',
                'model' => 'Embraer E190',
                'capacity' => 100,
                'autonomy' => 2500,
                'image' => 'embraer_e190.jpg',
            ],
            [
                'registration' => 'ES-D56',
                'model' => 'Boeing 777',
                'capacity' => 300,
                'autonomy' => 5000,
                'image' => 'boeing_777.jpg',
            ],
            [
                'registration' => 'ES-E67',
                'model' => 'Airbus A380',
                'capacity' => 500,
                'autonomy' => 8000,
                'image' => 'airbus_a380.jpg',
            ],
            [
                'registration' => 'ES-F78',
                'model' => 'Bombardier CRJ900',
                'capacity' => 90,
                'autonomy' => 2000,
                'image' => 'bombardier_crj900.jpg',
            ],
            [
                'registration' => 'ES-G89',
                'model' => 'Boeing 787',
                'capacity' => 250,
                'autonomy' => 12000,
                'image' => 'boeing_787.jpg',
            ],
            [
                'registration' => 'ES-H90',
                'model' => 'Airbus A350',
                'capacity' => 110,
                'autonomy' => 1200,
                'image' => 'airbus_a350.jpg',
            ],
            [
                'registration' => 'ES-I01',
                'model' => 'Boeing 747',
                'capacity' => 170,
                'autonomy' => 2000,
                'image' => 'boeing_747.jpg',
            ],
            [
                'registration' => 'ES-J12',
                'model' => 'Airbus A330',
                'capacity' => 290,
                'autonomy' => 11000,
                'image' => 'airbus_a330.jpg',
            ],
            [
                'registration' => 'ES-K23',
                'model' => 'Boeing 767',
                'capacity' => 200,
                'autonomy' => 10500,
                'image' => 'boeing_767.jpg',
            ],
            [
                'registration' => 'ES-L34',
                'model' => 'Airbus A220',
                'capacity' => 120,
                'autonomy' => 6000,
                'image' => 'airbus_a220.jpg',
            ],
            [
                'registration' => 'ES-O67',
                'model' => 'Boeing 757',
                'capacity' => 240,
                'autonomy' => 9000,
                'image' => 'boeing_757.jpg',
            ],
            [
                'registration' => 'ES-P78',
                'model' => 'Airbus A340',
                'capacity' => 350,
                'autonomy' => 15000,
                'image' => 'airbus_a340.jpg',
            ],
        ];

        foreach ($airplanes as $airplane) {
            Airplane::create($airplane);
        }
    }
}
