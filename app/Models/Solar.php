<?php

namespace App\Models;

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
    protected static $logName = 'school_solar';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " la energía solar  :subject.id";
    }
}
