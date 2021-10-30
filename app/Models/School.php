<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'name',
        'address',
        'district',
        'phone',
        'fax',
        'email',
        'liable',
        'image',
        'others',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withPivot('id', 'quantity', 'others')->withTimestamps();
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /**
     * Activity log
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('school')
            ->setDescriptionForEvent(fn(string $eventName) => "Se ha " .trans('logs.'.$eventName) . " la escuela  :subject.id")
            ->logOnlyDirty()
            ;
    }
}
