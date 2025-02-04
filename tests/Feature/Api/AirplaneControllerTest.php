<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Airplane;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AirplaneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCanGetAllTheAirplanes() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('airplanesApiIndex'));
        $response->assertStatus(200)
                 ->assertJsonCount(14);
    }

    public function test_CheckIfCanGetOnlyOneAirplane() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('airplanesApiShow', 1));
        $data = ['id' => 1];
        $response->assertStatus(200)
                 ->assertJsonFragment($data);
    }

    public function test_CheckIfCanCreateAnAirplane() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('airplanesApiStore'), [
            'registration' => 'PT-ABC',
            'model' => 'Boeing 737',
            'capacity' => 200,
            'autonomy' => 3000,
            'image' => 'boeing737.jpg'
        ]);
        $response->assertStatus(201)
                 ->assertJsonFragment([
                    'registration' => 'PT-ABC'
                ]);
    }

    public function test_CheckIfCanUpdateAnAirplane() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('airplanesApiUpdate', 1), [
            'registration' => 'PT-ABC',
            'model' => 'Boeing 737',
            'capacity' => 200,
            'autonomy' => 3000,
            'image' => 'boeing737.jpg',
        ]);
        $response->assertStatus(200)
                 ->assertJsonFragment([
                    'registration' => 'PT-ABC'
                ]);
    }

    public function test_CheckIfCanDeleteAnAirplane() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->deleteJson(route('airplanesApiDestroy', 1));
        $response->assertStatus(200);
    }
}
