<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airconditioning extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'subtypeenergy_id',
        'potency',
        'frigoria',
        'mark',
        'model',
        'number_groups',
        'types',
        'others'
    ];
}
