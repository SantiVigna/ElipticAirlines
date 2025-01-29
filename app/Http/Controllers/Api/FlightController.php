<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();
        return response()->json($flights, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_number' => 'required|string',
            'departure_airport' => 'required|string',
            'arrival_airport' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|integer',
        ]);

        $flight = Flight::create([
            'flight_number' => $validated['flight_number'],
            'departure_airport' => $validated['departure_airport'],
            'arrival_airport' => $validated['arrival_airport'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
            'price' => $validated['price'],
        ]);

        $flight->save();
        return response()->json($flight, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::findOrFail($id);
        return response()->json($flight, 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $flight = Flight::findOrFail($id);

        $validated = $request->validate([
            'flight_number' => 'required|string',
            'departure_airport' => 'required|string',
            'arrival_airport' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|integer',
        ]);

        $flight->update([
            'flight_number' => $validated['flight_number'],
            'departure_airport' => $validated['departure_airport'],
            'arrival_airport' => $validated['arrival_airport'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
            'price' => $validated['price'],
        ]);

        $flight->save();
        return response()->json($flight, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return response()->json(["message" => "Flight deleted Succesfully"], 204); 
    }
}
