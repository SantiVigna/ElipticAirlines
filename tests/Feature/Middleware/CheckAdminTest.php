<?php

namespace Tests\Feature\Middleware;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfAdminCanAccessToAirplanes()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'isAdmin' => 1
        ]);

        $response = $this->actingAs($admin)
                        ->get(route('airplanesIndex')); 

        $response->assertStatus(200);
    }

    public function test_CheckIfUserGetsRedirectedToFlights()
    {
        $user = User::create([
            'name' => 'Usuario Normal',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'isAdmin' => 0
        ]);

        $response = $this->actingAs($user)
                         ->get(route('airplanesIndex'));

        $response->assertRedirect('/flights');
        $response->assertSessionHas('error', 'No tienes permiso para acceder.');
    }
}