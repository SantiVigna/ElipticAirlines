<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::with('airplane')->get();
        return view('flights', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airplanes = Airplane::count();
        return view('createFlightForm' , compact('airplanes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_number' => 'required|string',
            'departure' => 'required|string',
            'arrival' => 'required|string',
            'departure_time' => 'required|string',
            'arrival_time' => 'required|string',
            'distance' => 'required|integer',
            'price' => 'required|integer',
            'airplane_id' => 'required|integer',
        ]);

        Flight::create([
            'flight_number' => $validated['flight_number'],
            'departure' => $validated['departure'],
            'arrival' => $validated['arrival'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
            'distance' => $validated['distance'],
            'price' => $validated['price'],
            'airplane_id' => $validated['airplane_id'],
        ]);

        return redirect()->route('flightsIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight, string $id)
    {
        $airplanes = Airplane::count();
        $flight = Flight::find($id);
        return view('editFlightForm' , compact('airplanes', 'flight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $flight = Flight::find($id);

        $validated = $request->validate([
            'flight_number' => 'string',
            'departure' => 'string',
            'arrival' => 'string',
            'departure_time' => 'string',
            'arrival_time' => 'string',
            'distance' => 'integer',
            'price' => 'integer',
            'airplane_id' => 'integer',
        ]);

        $flight->update([
            'flight_number' => $validated['flight_number'],
            'departure' => $validated['departure'],
            'arrival' => $validated['arrival'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
            'distance' => $validated['distance'],
            'price' => $validated['price'],
            'airplane_id' => $validated['airplane_id'],
        ]);

        return redirect()->route('flightsIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
