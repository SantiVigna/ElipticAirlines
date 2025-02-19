<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airplanes = Airplane::all();
        return view('airplanes', compact('airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createAirplaneForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $defaultAirplaneImage = 'https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg';
        
        $validated = $request->validate([
            'registration' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer',
            'autonomy' => 'required|integer',
            'image' => 'nullable|string',
        ]);

        Airplane::create([
            'registration' => $validated['registration'],
            'model' => $validated['model'],
            'capacity' => $validated['capacity'],
            'autonomy' => $validated['autonomy'],
            'image' => $validated['image'] ?? $defaultAirplaneImage,
        ]);

        return redirect()->route('airplanesIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airplane $airplane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airplane $airplane)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airplane $airplane)
    {
        //
    }
}
