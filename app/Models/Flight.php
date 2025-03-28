<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tests\Feature\Models\FlightTest;

class Flight extends Model
{
    protected $fillable = [
        'flight_number',
        'departure',
        'arrival',
        'departure_time',
        'arrival_time',
        'distance',
        'price',
        'airplane_id',
        'available',
    ];

    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->as('reservations');
    }

    static function checkRemainingSeats(string $id) {
        $flight = Flight::findOrFail($id);
        $reservations = FlightUser::where('flight_id', $flight->id)->get();
        $remainingSeats = $flight->airplane->capacity - $reservations->sum('seats');
        return $remainingSeats;
    }
    
    static function checkFlightAvailability(string $id) {
        $flight = Flight::findOrFail($id);
        $checkSeatsAvaliability = Flight::checkRemainingSeats($id);

        if ($checkSeatsAvaliability == 0) {
            $flight->available = false;
            $flight->save();
        }
        if ($checkSeatsAvaliability > 0) {
            $flight->available = true;
            $flight->save();
        }
        return $checkSeatsAvaliability;
    }
}
