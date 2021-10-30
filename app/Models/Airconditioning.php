<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airconditioning extends Model
{
    use HasFactory, LogsActivity;

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

    /**
     * Activity log
     */
    protected static $logName = 'school_airconditioning';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " el aire acondicionado  :subject.id";
    }
}
