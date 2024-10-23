<?php

namespace App\Models;

use App\Http\Resources\BlogResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_content',
        'user_id',
        'category_id',
        'image',
    ];
    protected $table = 'blogs';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function blogBodies()
    {
        return $this->hasMany(BlogBody::class, 'blog_id');
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
