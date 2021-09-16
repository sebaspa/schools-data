<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'address',
        'district',
        'phone',
        'fax',
        'email',
        'liable',
        'others',
    ];

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withPivot('id', 'quantity')->withTimestamps();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
