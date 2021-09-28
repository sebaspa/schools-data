<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solar extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'total_area',
        'number_panels',
        'installed_potency',
        'mark',
        'model',
        'energy_supplied',
        'others'
    ];
}
