<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Plan extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['title', 'description', 'document', 'document_free', 'school_id', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Activity log
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('plan')
            ->setDescriptionForEvent(fn(string $eventName) => "Se ha " .trans('logs.'.$eventName) . " el plano  :subject.id")
            ->logOnlyDirty()
            ;
    }
}
