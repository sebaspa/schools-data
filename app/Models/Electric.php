<?php

namespace App\Models;

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
    protected static $logName = 'school_electric';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " la energía eléctrica  :subject.id";
    }
}
