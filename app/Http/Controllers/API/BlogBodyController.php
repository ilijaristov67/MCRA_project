<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogBody;
use App\Http\Requests\BlogBodyRequest;
use App\Http\Resources\BlogBodyResource;

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

    public function show($id)
    {
        $blogBody = BlogBody::where('blog_id', $id)->get();
        return BlogBodyResource::collection($blogBody);
    }

    public function update(Request $request, $id)
    {
        $blogBody = BlogBody::where('blog_id', $id)->get();

        foreach ($request->input('subtitle') as $index => $subtitle) {

            if (isset($blogBody[$index])) {

                $subsection = $blogBody[$index];
                $subsection->subtitle = $subtitle;
                $subsection->sub_content = $request->input('sub_content')[$index];
                $subsection->save();
            } else {
                BlogBody::create([
                    'blog_id' => $id,
                    'subtitle' => $subtitle,
                    'sub_content' => $request->input('sub_content')[$index],
                ]);
            }
        }
        return response()->json(['message' => 'Blog body updated successfully!']);
    }
}
