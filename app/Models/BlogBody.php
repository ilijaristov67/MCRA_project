<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogBody extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'subtitle',
        'sub_content'
    ];

    protected $table = 'blog_body';

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
