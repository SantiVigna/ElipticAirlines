<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Flight;
use App\Models\Airplane;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create([
            'isAdmin' => 1,
        ]);
    }
    
    public function test_CheckIfCanGetFlightView()
    {
        $this->seed(DatabaseSeeder::class);
        
        $response = $this->get(route('flightsIndex'));

        $response->assertViewIs('flights');        
    }

    public function test_CheckIfFlightCreateFormLoadsCorrectly()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->actingAs($this->admin)
                         ->get(route('flightsForm')); 

        $response->assertStatus(200)
                 ->assertViewIs('createFlightForm');
    }

    public function test_CheckIfFlightEditFormLoadsCorrectly()
    {
        $this->seed(DatabaseSeeder::class);



        $response = $this->actingAs($this->admin)
                         ->get(route('flightEditForm', 1)); 

        $response->assertStatus(200)
                 ->assertViewIs('editFlightForm');
    }

    public function test_CheckIfCanStoreAFlight()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->actingAs($this->admin)
                         ->post(route('flightsStore'), [
            'flight_number' => 'ES-A19',
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
            'departure_time' => '01/02/2023',
            'arrival_time' => '01/02/2023',
            'distance' => 620,
            'price' => 50,
            'airplane_id' => 1,
        ]);

        $response->assertRedirect(route('flightsIndex'));
    }

    public function test_CheckIfCanDeleteAFlight() {
        $this->seed(DatabaseSeeder::class);

        $response = $this->actingAs($this->admin)
                         ->delete(route('flightDelete', 1));

        $response->assertRedirect(route('flightsIndex'));
    }
}
