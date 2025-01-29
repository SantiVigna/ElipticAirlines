<?php

namespace App\Http\Controllers\Api;

use App\Models\Airplane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airplanes = Airplane::all();
        return response()->json($airplanes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer',
            'autonomy' => 'required|integer',
        ]);

        $airplane = Airplane::create([
            'registration' => $validated['registration'],
            'model' => $validated['model'],
            'capacity' => $validated['capacity'],
            'autonomy' => $validated['autonomy'],
        ]);

        $airplane->save();
        return response()->json($airplane, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $airplane = Airplane::findOrFail($id);
        return response()->json($airplane, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $airplane = Airplane::findOrFail($id);

        $validated = $request->validate([
            'registration' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer',
            'autonomy' => 'required|integer',
        ]);

        $airplane->update([
            'registration' => $validated['registration'],
            'model' => $validated['model'],
            'capacity' => $validated['capacity'],
            'autonomy' => $validated['autonomy'],
        ]);

        $airplane->save();
        return response()->json($airplane, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airplane = Airplane::findOrFail($id);
        $airplane->delete();   
        
        return response()->json(['message' => 'Airplane deleted Succesfully'], 204);   
    }
}
