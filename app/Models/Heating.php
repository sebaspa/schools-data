<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Heating extends Model
{
    use HasFactory, LogsActivity;

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

    /**
     * Activity log
     */
    protected static $logName = 'school_heating';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " la energía calefactora  :subject.id";
    }
}
