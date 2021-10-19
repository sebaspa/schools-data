<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'document', 'document_free', 'school_id', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
