<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('school_airconditioning')
            ->setDescriptionForEvent(fn(string $eventName) => "Se ha " .trans('logs.'.$eventName) . " la energia  :subject.id")
            ->logOnlyDirty()
            ;
    }
}
