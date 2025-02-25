<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Flight;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_CheckIfCanGetFlightView()
    {
        $this->seed(DatabaseSeeder::class);
        
        $response = $this->get(route('flightsIndex'));

        $response->assertViewIs('flights');        
    }
}
