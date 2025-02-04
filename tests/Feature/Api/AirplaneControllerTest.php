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

}
