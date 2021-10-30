<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Electric extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'school_id',
        'supplying_company',
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

    /**
     * Activity log
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('school_electric')
            ->setDescriptionForEvent(fn(string $eventName) => "Se ha " .trans('logs.'.$eventName) . " la energia  :subject.id")
            ->logOnlyDirty()
            ;
    }
}
