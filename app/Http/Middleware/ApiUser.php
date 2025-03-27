<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class ApiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = JWTAuth::parseToken()->authenticate();

        if ($user->isAdmin === 0) {
            return $next($request);
        }

        if ($user->isAdmin === 1) {
            return response()->json(['message' => 'Eres Admin, para que quieres hacer eso?'], 401);
        }

        return response()->json(['message' => 'No puedes realizar esta accion'], 401);
    }
}
