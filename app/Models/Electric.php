<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electric extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'contract_type',
        'supply_number',
        'number_light_meter',
        'hired_potency',
        'total_potency',
        'general_rush',
        'number_circuits',
        'partial_squares',
        'others'
    ];
}
