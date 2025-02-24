<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Flight;
use App\Models\Airplane;
use Dflydev\DotAccessData\Data;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlightTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfAFlightBelongsToAnAirplane()
    {
        $this->seed(DatabaseSeeder::class);

        $flight = Flight::first();
        $this->assertInstanceOf(Airplane::class, $flight->airplane);
        
    }
}
