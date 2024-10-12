<?php

namespace App\Models;

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
}
