<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {


        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to like or unlike posts.'
            ], 401);
        }

        $user = Auth::user();

        $request->validate([
            'likeable_type' => 'required|string',
            'likeable_id' => 'required|integer'
        ]);

        $likeableType = $request->likeable_type;
        $likeableId = $request->likeable_id;
        if (!class_exists($likeableType)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid likeable type.'
            ], 400);
        }

        $likeable = $likeableType::find($likeableId);

        if (!$likeable) {
            return response()->json([
                'success' => false,
                'message' => 'Likeable entity not found.'
            ], 404);
        }

        $existingLike = Like::where([
            'user_id' => $user->id,
            'likeable_id' => $likeableId,
            'likeable_type' => $likeableType,
        ])->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json([
                'success' => true,
                'message' => 'Like removed.'
            ]);
        } else {
            $like = new Like();
            $like->user_id = $user->id;
            $like->likeable_id = $likeableId;
            $like->likeable_type = $likeableType;
            $like->save();

            return response()->json([
                'success' => true,
                'message' => 'Like added.'
            ]);
        }
    }
}
