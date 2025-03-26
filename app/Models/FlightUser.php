<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightUser extends Model
{
    protected $table = 'flight_user';

    protected $fillable = [
        'seats',
        'name',
        'email',
        'flight_id',
        'user_id',
    ];
}
