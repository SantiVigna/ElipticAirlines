<?php

namespace Tests\Feature\Requests\Auth;

use Mockery;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginRequestTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_authorize()
    {
        $request = new LoginRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules()
    {
        $request = new LoginRequest();

        $rules = $request->rules();

        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);
    }

    public function test_ensureIsNotRateLimited()
    {
        $request = new LoginRequest([
            'email' => 'test@example.com',
        ]);

        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);

        $request->ensureIsNotRateLimited();
    }

    public function test_ensureIsNotRateLimited_when_rate_limited()
    {
        $this->expectException(ValidationException::class);

        $request = new LoginRequest([
            'email' => 'test@example.com',
        ]);

        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(true);
        RateLimiter::shouldReceive('availableIn')->once()->andReturn(60);
        Event::shouldReceive('dispatch')->once()->with(Mockery::type(Lockout::class));

        $request->ensureIsNotRateLimited();
    }

    public function test_throttleKey()
    {
        $request = new LoginRequest([
            'email' => 'test@example.com',
        ]);

        $key = $request->throttleKey();

        $this->assertStringContainsString('test@example.com', $key);
    }
}
