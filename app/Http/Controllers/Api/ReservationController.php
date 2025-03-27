<?php

namespace App\Http\Controllers\Api;

use App\Models\FlightUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = FlightUser::all();
        return response()->json($reservations, 200);
    }
}
