<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heating extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'subtypeenergy_id',
        'number_radiators',
        'potency',
        'model',
        'gas',
        'gasoil',
        'type_boiler',
        'tank_volume',
        'others'
    ];
}
