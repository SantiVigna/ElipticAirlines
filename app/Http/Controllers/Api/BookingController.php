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
    
    public function bookFlight(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|integer',
            'seats' => 'required|integer|min:1',
        ]);

        $flight = Flight::findOrFail($request->flight_id);

        
        $avaliableSeats = Flight::checkRemainingSeats($flight->id);

        if ($avaliableSeats < $request->seats) {
            return response()->json([
                'message' => 'El vuelo no tiene suficientes asientos disponibles',
                'available_seats' => $avaliableSeats,
            ], 400);
        }

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

        $flightAvaliability = Flight::checkFlightAvailability($flight->id);

        return response()->json(['message' => 'Asientos reservados correctamente'], 200);
    }

    
    public function viewReservations()
    {
        $user = JWTAuth::parseToken()->authenticate();

        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $cart = FlightUser::where('user_id', $user->id)->get();

        if ($cart->isEmpty()) {
            return response()->json(['message' => 'No tienes reservas'], 404);
        }

        return response()->json(['cart' => $cart]);
    }

    
    public function cancelBooking(string $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $reservation = FlightUser::find($id);
       
        if (!$reservation || $reservation->user_id !== $user->id) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $reservation->delete();

        $flightAvaliability = Flight::checkFlightAvailability($reservation->flight_id);
        
        return response()->json(['message' => 'Reserva cancelada con éxito']);
    }
}

