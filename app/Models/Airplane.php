<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{    
    protected $fillable = [
        'registration',
        'model',
        'capacity',
        'autonomy',
    ];
}
