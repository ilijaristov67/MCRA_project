<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'speakers';

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_speakers', 'speaker_id', 'event_id');
    }

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'conference_speakers');
    }
}
