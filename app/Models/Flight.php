<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->as('booking');
    }
}
