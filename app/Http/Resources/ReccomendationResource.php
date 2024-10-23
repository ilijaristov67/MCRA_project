<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReccomendationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reccomendation' => $this->reccomendation,
            'user_id' => $this->user_id,
            'blog_id' => $this->blog_id,
            'reccomended_by' => $this->reccomended_by,
            'created_at' => $this->created_at,
            'is_approved' => $this->is_approved,
            'reccomender' => new UserResource($this->whenLoaded('reccomender')),
        ];
    }
}
