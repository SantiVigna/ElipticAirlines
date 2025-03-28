<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Flight;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;
    
    protected $user;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'isAdmin' => 0,
        ]);
        $this->token = JWTAuth::fromUser($this->user);
    } 

    public function test_CheckIfCanBookAFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('bookFlight'), [
            'flight_id' => 1,
            'seats' => 1,
        ], ['Authorization' => 'Bearer ' . $this->token]);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                    'message' => 'Asientos reservados correctamente'
                ]);
    }

    public function test_CheckIfTryToBookMoreSeatsThanAvaliable() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('bookFlight'), [
            'flight_id' => 1,
            'seats' => 1000,
        ], ['Authorization' => 'Bearer ' . $this->token]);

        $response->assertStatus(400)
                 ->assertJsonFragment([
                    'message' => 'El vuelo no tiene suficientes asientos disponibles'
                ]);
    }

}
