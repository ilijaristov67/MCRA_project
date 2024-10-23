<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'biography',
        'city',
        'country',
        'number',
        'cv',
        'photo',
        'role_id',
        'title'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function receivedReccomendations()
    {

        return $this->hasMany(Reccomendation::class, 'user_id');
    }
    public function givenRecommendations()
    {
        return $this->hasMany(Reccomendation::class, 'recommended_by');
    }

    public function sentConnections()
    {
        return $this->hasMany(Connection::class, 'sender_id');
    }
    public function receivedConnections()
    {

        return $this->hasMany(Connection::class, 'received_id');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
