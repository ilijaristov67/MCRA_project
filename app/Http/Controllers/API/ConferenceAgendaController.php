<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ConferenceAgenda;
use App\Models\ConferenceDay;
use Illuminate\Http\Request;

class ConferenceAgendaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'conference_day_id' => 'required|array',
            'conference_day_id.*' => 'exists:conference_days,id',
            'title' => 'required|array',
            'title.*' => 'string|max:255',
            'content' => 'nullable|array',
            'content.*' => 'string',
            'time' => 'required|array',
            'time.*' => 'date_format:H:i',
            'speaker_id' => 'nullable|array',
            'speaker_id.*' => 'exists:speakers,id',
        ]);

        $conferenceDayIds = $validated['conference_day_id'];
        $titles = $validated['title'];
        $contents = $validated['content'] ?? [];
        $times = $validated['time'];
        $speakerIds = $validated['speaker_id'] ?? [];


        $count = count($titles);
        if (
            count($conferenceDayIds) !== $count ||
            count($times) !== $count ||
            (count($contents) > 0 && count($contents) !== $count) ||
            (count($speakerIds) > 0 && count($speakerIds) !== $count)
        ) {
            return response()->json([
                'message' => 'Mismatch in the number of agenda items provided.',
            ], 422);
        }

        foreach ($titles as $index => $title) {

            $exists = ConferenceAgenda::where('conference_day_id', $conferenceDayIds[$index])
                ->where('time', $times[$index])
                ->exists();

            if ($exists) {
                return response()->json([
                    'message' => "The time slot {$times[$index]} is already taken for conference day ID {$conferenceDayIds[$index]}."
                ], 422);
            }

            ConferenceAgenda::create([
                'conference_day_id' => $conferenceDayIds[$index],
                'title' => $title,
                'content' => $contents[$index] ?? null,
                'time' => $times[$index],
                'speaker_id' => $speakerIds[$index] ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Agenda items added successfully.',
        ], 201);
    }


    public function index($conferenceId)
    {
        $agendas = ConferenceAgenda::with(['conferenceDay', 'speaker'])
            ->whereHas('conferenceDay', function ($query) use ($conferenceId) {
                $query->where('conference_id', $conferenceId);
            })
            ->get();

        return response()->json(['data' => $agendas], 200);
    }

    public function show($id)
    {
        $agenda = ConferenceAgenda::with(['conferenceDay', 'speaker'])->find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda item not found.']);
        }

        return response()->json(['data' => $agenda]);
    }

    public function update(Request $request, $id)
    {
        $agenda = ConferenceAgenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda item not found.']);
        }

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'time' => 'required',
            'speaker_id' => 'nullable',
        ]);

        if ($validated['time'] !== $agenda->time) {
            $exists = ConferenceAgenda::where('conference_day_id', $agenda->conference_day_id)
                ->where('time', $validated['time'])
                ->where('id', '!=', $agenda->id)
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'This time slot is already taken for the selected day.']);
            }
        }

        $agenda->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agenda item updated successfully.',
            'data' => $agenda,
        ], 200);
    }

    public function destroy($id)
    {
        $agenda = ConferenceAgenda::find($id);

        if (!$agenda) {
            return response()->json(['message' => 'Agenda item not found.']);
        }

        $agenda->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agenda item deleted successfully.',
        ]);
    }
}
