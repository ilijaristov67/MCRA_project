<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\json;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function store(BlogRequest $request)
    {

        DB::enableQueryLog();

        // Create a new blog
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->main_content = $request->main_content;
        $blog->user_id = $request->user_id;
        $blog->category_id = $request->category_id;
        $blog->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $imagePath = request()->file('image')->move(public_path('blogsImages/' . $blog->id), $imageName);
            $blog->image = 'images/' . $blog->id . '/' . $imageName;
            $blog->save();
        }

        Log::info(DB::getQueryLog());

        if ($blog) {
            return response()->json([
                'id' => $blog->id,
                'success' => true,
                'message' => 'Blog has been created successfully'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create the blog'
            ], 500);
        }
    }
}
