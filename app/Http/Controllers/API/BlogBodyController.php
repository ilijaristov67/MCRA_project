<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogBody;
use App\Http\Requests\BlogBodyRequest;

class BlogBodyController extends Controller
{

    public function store(BlogBodyRequest $request)
    {
        $blogId = $request->blog_id;
        $subTitles = $request->subtitle;
        $subContents = $request->sub_content;
        foreach ($subTitles as $index => $title) {
            $blogBody = BlogBody::create([
                'blog_id' => $blogId,
                'subtitle' => $title,
                'sub_content' => $subContents[$index],
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Blog content created successfuly',
        ]);
    }
}
