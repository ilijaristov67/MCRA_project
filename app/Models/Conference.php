<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
        'title',
        'theme',
        'description',
        'objective',
        'location',
        'status',
        'start_date',
        'end_date',
    ];

    public function days()
    {
        return $this->hasMany(ConferenceDay::class, 'conference_id', 'id');
    }
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'conference_speakers');
    }
}
