<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCanGetAllTheFlights() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('flightsApiIndex'));
        $response->assertStatus(200)
                 ->assertJsonCount(10);
    }

    public function test_CheckIfCanGetOnlyOneFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('flightsApiShow', 1));
        $data = ['id' => 1];
        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    public function test_CheckIfCanCreateAFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('flightsApiStore'), [
            'flight_number' => 'ES-A19',
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
            'departure_time' => '01/02/2023',
            'arrival_time' => '01/02/2023',
            'distance' => 620,
            'price' => 50,
            'airplane_id' => 8,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                    'flight_number' => 'ES-A19'
                ]);
    }
    public function test_CheckIfCanUpdateAFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('flightsApiUpdate', 1), [
            'flight_number' => 'ES-A19',
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
            'departure_time' => '01/02/2023',
            'arrival_time' => '01/02/2023',
            'distance' => 620,
            'price' => 50,
            'airplane_id' => 8,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                    'flight_number' => 'ES-A19'
                ]);
    }
    
    public function test_CheckIfCanDeleteAFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->deleteJson(route('flightsApiDestroy', 1));
        $response->assertStatus(200);
    }
}
