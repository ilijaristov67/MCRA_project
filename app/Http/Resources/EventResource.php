<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'title' => $this->title,
            'theme' => $this->theme,
            'description' => $this->description,
            'objectives' => $this->objectives,
            'date' => $this->date,
            'day' => $this->day,
            'location' => $this->location,
            'ticket_price' => $this->ticket_price,
            'speakers' => $this->speakers->map(function ($speaker) {
                return [
                    'id' => $speaker->id,
                    'name' => $speaker->name,
                    'last_name' => $speaker->last_name,
                    'info' => $speaker->info,
                    'social_media' => $speaker->social_media,
                ];
            }),
            'eventAgendas' => $this->eventAgendas->map(function ($agenda) {
                return [
                    'id' => $agenda->id,
                    'title' => $agenda->title,
                    'content' => $agenda->content,
                    'time' => $agenda->time,
                    'spekaer_id' => $agenda->speaker_id,
                ];
            }),
        ];
    }
}
