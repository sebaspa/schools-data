<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solar extends Model
{
    use HasFactory, LogsActivity;
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

    /**
     * Activity log
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('school_solar')
            ->setDescriptionForEvent(fn (string $eventName) => "Se ha " . trans('logs.' . $eventName) . " la energia  :subject.id")
            ->logOnlyDirty();
    }
}
