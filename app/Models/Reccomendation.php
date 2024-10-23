<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reccomendation extends Model
{
    use HasFactory;

    protected $table = "reccomendations";
    protected $fillable = [
        'reccomendation',
        'user_id',
        'reccomended_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reccomender()
    {
        return $this->belongsTo(User::class, 'reccomended_by');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
