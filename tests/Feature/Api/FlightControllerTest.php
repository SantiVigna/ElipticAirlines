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
}
