<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {
        if ($request->filled('blog_id')) {
            $comment =  Comment::create([
                'comment' => $request->comment,
                'user_id' => $request->user_id,
                'blog_id' => $request->blog_id
            ]);

            if ($comment) {
                return response()->json([
                    'success' => true,
                    'message' => 'Comment saved'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Comment was not saved'
            ]);
        }
        if ($request->filled('parent_id')) {
            $reply =  Comment::create([
                'comment' => $request->comment,
                'user_id' => $request->user_id,
                'parent_id' => $request->parent_id
            ]);

            if ($reply) {
                return response()->json([
                    'success' => true,
                    'message' => 'reply saved'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Comment was not saved'
            ]);
        }
    }

    public function index($id)
    {
        $comments = Comment::where('blog_id', $id)
            ->whereNull('parent_id')
            ->with(['replies.user', 'user'])
            ->get();

        return CommentResource::collection($comments);
    }

    public function getSingleComment($id)
    {

        $comment = Comment::findOrFail($id);

        if ($comment->is_banned) {
            return response()->json([
                'message' => 'This comment is unavailable because it has been banned.'
            ], 403);
        }


        return new CommentResource($comment);
    }


    public function editComment(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->editComment;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'comment edited',
        ]);
    }

    public function deleteComment($id)
    {

        Report::where('reportable_id', $id)
            ->where('reportable_type', Comment::class)
            ->delete();

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment and related reports deleted',
        ]);
    }

    public function getCommentLikes($id)
    {
        $comment = Comment::findOrFail($id);

        return response()->json([
            'like_count' => $comment->likes()->count(),
            'user_liked' => Auth::check() ? $comment->likes()->where('user_id', Auth::id())->exists() : false,
        ]);
    }
}
