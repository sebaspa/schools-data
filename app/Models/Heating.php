<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('school_heating')
            ->setDescriptionForEvent(fn(string $eventName) => "Se ha " .trans('logs.'.$eventName) . " la energia  :subject.id")
            ->logOnlyDirty()
            ;
    }
}
