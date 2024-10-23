<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceDay extends Model
{
    protected $fillable = ['conference_id', 'date'];

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function agendas()
    {
        return $this->hasMany(ConferenceAgenda::class);
    }
}
