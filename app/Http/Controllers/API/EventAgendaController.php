<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventAgenda;
use App\Models\Event;
use Carbon\Carbon;

class EventAgendaController extends Controller
{
    public function store(Request $request)
    {
        $eventId = $request->input('event_id');
        $agendaSubtitles = $request->input('event_agenda_subtitle');
        $agendaSubcontents = $request->input('event_agenda_subcontent');
        $agendaTimes = $request->input('event_agenda_time');
        $agendaSpeakers = $request->input('event_agenda_speakers');

        $request->validate([
            'event_agenda_time.*' => [
                'required',
                function ($attribute, $value, $fail) use ($eventId) {
                    if (EventAgenda::where('event_id', $eventId)->where('time', $value)->exists()) {
                        $fail("The time slot {$value} has already been taken for this event.");
                    }
                }
            ],
        ]);


        for ($i = 0; $i < count($agendaSubtitles); $i++) {
            EventAgenda::create([
                'event_id' => $eventId,
                'title' => $agendaSubtitles[$i],
                'content' => $agendaSubcontents[$i],
                'time' => $agendaTimes[$i],
                'speaker_id' => $agendaSpeakers[$i] ?? null,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Event agenda saved successfully']);
    }

    public function update(Request $request, $id)
    {
        $agenda = EventAgenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Agenda item not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'time' => 'nullable',
            'speaker_id' => 'nullable|exists:speakers,id',
        ]);

        if ($validatedData['time'] !== $agenda->time) {
            $exists = EventAgenda::where('event_id', $agenda->event_id)
                ->where('time', '=', $validatedData['time'])
                ->where('id', '!=', $agenda->id)
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'The selected time is already taken for this event.'], 422);
            }
        }

        $agenda->fill($validatedData);
        $agenda->save();

        return response()->json([
            'success' => true,
            'message' => 'Agenda item updated successfully',
        ]);
    }


    public function index()
    {
        $agendas = EventAgenda::with(['event', 'speaker'])
            ->get()
            ->map(function ($agenda) {
                return [
                    'id' => $agenda->id,
                    'event_title' => $agenda->event ? $agenda->event->title : 'No Event',
                    'title' => $agenda->title,
                    'content' => $agenda->content,
                    'time' => $agenda->time,
                    'speaker_name' => $agenda->speaker ? $agenda->speaker->name . ' ' . $agenda->speaker->last_name : 'N/A',
                    'event_id' => $agenda->event_id,
                ];
            });

        return response()->json(['data' => $agendas]);
    }




    public function show($id)
    {
        $agenda = EventAgenda::with('event', 'speaker')->find($id);
        if ($agenda) {
            return response()->json(['data' => $agenda]);
        } else {
            return response()->json(['message' => 'Agenda item not found'], 404);
        }
    }



    public function destroy($id)
    {
        $agenda = EventAgenda::find($id);
        if (!$agenda) {
            return response()->json(['message' => 'Agenda item not found'], 404);
        }

        $agenda->delete();

        return response()->json(['success' => true, 'message' => 'Agenda item deleted successfully']);
    }

    public function getEventSpeakers($eventId)
    {
        $event = Event::with('speakers')->find($eventId);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $speakers = $event->speakers;

        return response()->json(['data' => $speakers]);
    }
}
