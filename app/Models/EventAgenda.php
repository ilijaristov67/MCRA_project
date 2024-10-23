<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAgenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'title',
        'content',
        'time',
        'speaker_id',
    ];
    protected $table = 'event_agendas';
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
