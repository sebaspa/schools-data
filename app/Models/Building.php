<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description'
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class)->withPivot('id', 'quantity', 'others')->withTimestamps();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Activity log
     */
    protected static $logName = 'school_building';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " el edificio  :subject.id";
    }
}
