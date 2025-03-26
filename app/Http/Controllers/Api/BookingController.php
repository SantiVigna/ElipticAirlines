<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlightUser;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


class BookingController extends Controller
{
    // Agregar vuelo al carrito
    public function addToCart(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|integer',
            'seats' => 'required|integer|min:1',
        ]);

        $flight = Flight::findOrFail($request->flight_id);

        // Verificar si hay plazas disponibles
        if ($flight->users()->count() === $flight->capacity) {
            return response()->json(['message' => 'El vuelo está lleno'], 400);
        }

        // Obtener el usuario autenticado
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }
        
        FlightUser::create([
            'name' => $user->name,
            'email' => $user->email,
            'seats' => $request->seats,
            'flight_id' => $flight->id,
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Vuelo añadido al carrito'], 200);
    }

    // Ver el carrito
    public function viewCart(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $cart = session()->get('cart', []);

        // Filtrar el carrito para mostrar solo los vuelos del usuario autenticado
        $userCart = array_filter($cart, function ($item) use ($user) {
            return $item['user_name'] === $user->name;
        });

        return response()->json(['cart' => $userCart]);
    }

    // Eliminar un vuelo del carrito
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->flight_id])) {
            unset($cart[$request->flight_id]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Vuelo eliminado del carrito', 'cart' => $cart]);
    }

    /* // Cancelar una reserva
    public function cancelBooking(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
        ]);

        $flight = Flight::findOrFail($request->flight_id);

        // Eliminar la reserva de la tabla pivot
        $user->flights()->detach($flight->id);

        return response()->json(['message' => 'Reserva cancelada con éxito']);
    } */
}

