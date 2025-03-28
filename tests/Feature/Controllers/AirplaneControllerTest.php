<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Airplane;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AirplaneControllerTest extends TestCase
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

    public function test_CheckIfCanGetAirplaneView()
    {
        $this->seed(DatabaseSeeder::class);
        
        $response = $this->actingAs($this->admin)
                         ->get(route('airplanesIndex'));

        $response->assertViewIs('airplanes');        
    }

    public function test_CheckIfCanGetAirplaneCreateView()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->actingAs($this->admin)
                         ->get(route('airplanesForm'));

        $response->assertViewIs('createAirplaneForm');        
    }

    public function test_CheckIfCanStoreAirplane()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->actingAs($this->admin)
                         ->post(route('airplanesStore'), [
            'registration' => 'N12345',
            'model' => 'Boeing 747',
            'capacity' => 416,
            'autonomy' => 13600,
            'image' => 'https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg',
        ]);

        $response->assertRedirect(route('airplanesIndex'));

        $this->assertDatabaseHas('airplanes', [
            'registration' => 'N12345',
            'model' => 'Boeing 747',
            'capacity' => 416,
            'autonomy' => 13600,
            'image' => 'https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg',
        ]);
    }

    public function test_CheckIfCanDeleteAirplane()
    {
        $this->seed(DatabaseSeeder::class);

        $airplane = Airplane::create([
            'registration' => 'N12345',
            'model' => 'Boeing 747',
            'capacity' => 416,
            'autonomy' => 13600,
            'image' => 'https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg',
        ]);

        $response = $this->actingAs($this->admin)
                         ->delete(route('airplaneDelete', $airplane->id));

        $response->assertRedirect(route('airplanesIndex'));

        $this->assertDatabaseMissing('airplanes', [
            'id' => $airplane->id,
        ]);
    }

}
