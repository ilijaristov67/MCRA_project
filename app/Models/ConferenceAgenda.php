<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceAgenda extends Model
{
    protected $fillable = [
        'conference_day_id',
        'title',
        'content',
        'time',
        'speaker_id',
    ];

    protected $table = 'conferences_agendas';

    public function conferenceDay()
    {
        return $this->belongsTo(ConferenceDay::class, 'conference_day_id', 'id');
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
