<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Agregar vuelo al carrito
    public function addToCart(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
        ]);

        $flight = Flight::findOrFail($request->flight_id);

        // Verificar si hay plazas disponibles
        if ($flight->users()->count() >= $flight->capacity) {
            return response()->json(['message' => 'El vuelo está lleno'], 400);
        }

        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);

        // Agregar el vuelo si no está ya añadido
        if (!isset($cart[$flight->id])) {
            $cart[$flight->id] = [
                'id' => $flight->id,
                'name' => $flight->name,
                'price' => $flight->price,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'Vuelo añadido al carrito', 'cart' => $cart]);
    }

    // Ver el carrito
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart' => $cart]);
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

