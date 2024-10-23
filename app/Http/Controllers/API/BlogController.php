<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\UdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\json;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function store(BlogRequest $request)
    {

        DB::enableQueryLog();
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->main_content = $request->main_content;
        $blog->user_id = $request->user_id;
        $blog->category_id = $request->category_id;
        $blog->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->move(public_path('blogsImages/' . $blog->id), $imageName);
            $blog->image = 'blogsImages/' . $blog->id . '/' . $imageName;
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
    public function index()
    {
        $blogs = Blog::all();
        return BlogResource::collection($blogs);
    }

    public function showBlogView()
    {
        return view('blogs.singleBlog');
    }

    public function show($id)
    {
        return new BlogResource(Blog::find($id));
    }



    public function getLikes($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found.'
            ], 404);
        }

        $likeCount = $blog->likes()->count();
        $userLiked = Auth::check() ? $blog->likes()->where('user_id', Auth::id())->exists() : false;

        return response()->json([
            'like_count' => $likeCount,
            'user_liked' => $userLiked
        ]);
    }



    public function recomendedBlogs($id)
    {
        $recommendedBlogs = Blog::where('category_id', $id)->get();
        return BlogResource::collection($recommendedBlogs);
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->main_content = $request->main_content;
        $blog->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->move(public_path('blogsImages/' . $blog->id), $imageName);
            $blog->image = 'blogsImages/' . $blog->id . '/' . $imageName;
        }

        $blog->save();
        return response()->json([
            'success' => true,
            'message' => 'Blog updated successfully!',
            'data' => $blog
        ]);
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json([
            'success' => true,
            'message' => 'Blog successfully deleted'
        ]);
    }
}
