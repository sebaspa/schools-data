<?php

namespace App\Models;

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
    protected static $logName = 'school_plan';
    protected static $logOnlyDirty = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Se ha " . trans('logs.' . $eventName) . " el plano  :subject.id";
    }
}
