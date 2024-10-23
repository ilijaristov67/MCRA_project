<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'theme',
        'description',
        'objectives',
        'date',
        'location',
        'ticket_price'
    ];
    protected $table = 'events';

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'events_speakers', 'event_id', 'speaker_id');
    }

    public function eventAgendas()
    {
        return $this->hasMany(EventAgenda::class)->orderBy('time');
    }
}
