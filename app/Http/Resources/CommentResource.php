<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user_id' => $this->user_id,
            'blog_id' => $this->blog_id,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'replies' => CommentResource::collection($this->replies),
            'user' => new UserResource($this->whenLoaded('user')),
            'likes_count' => $this->likes()->count(),
            'user_liked' => Auth::check() ? $this->likes()->where('user_id', Auth::id())->exists() : false,
        ];
    }
}
