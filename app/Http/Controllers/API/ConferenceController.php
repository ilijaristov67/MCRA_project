<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\ConferenceDay;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::with('speakers')->get();

        return response()->json(['data' => $conferences], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'objective' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'speakers' => 'nullable|array',
            'speakers.*' => 'exists:speakers,id',
        ]);

        $conference = Conference::create($validated);

        if (isset($validated['speakers'])) {
            $conference->speakers()->attach($validated['speakers']);
        }

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            ConferenceDay::create([
                'conference_id' => $conference->id,
                'date' => $date->format('Y-m-d'),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Conference created successfully.',
            'data' => $conference,
        ], 201);
    }

    public function show($id)
    {
        $conference = Conference::with(['days.agendas.speaker', 'speakers'])->find($id);

        if (!$conference) {
            return response()->json(['message' => 'Conference not found.'], 404);
        }

        return response()->json(['data' => $conference], 200);
    }

    public function update(Request $request, $id)
    {
        $conference = Conference::find($id);

        if (!$conference) {
            return response()->json(['message' => 'Conference not found.'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'objective' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'speakers' => 'nullable|array',
            'speakers.*' => 'exists:speakers,id',
        ]);

        $conference->update($validated);

        if (isset($validated['speakers'])) {
            $conference->speakers()->sync($validated['speakers']);
        }

        if ($conference->wasChanged(['start_date', 'end_date'])) {
            $conference->days()->delete();
            $startDate = Carbon::parse($validated['start_date']);
            $endDate = Carbon::parse($validated['end_date']);

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                ConferenceDay::create([
                    'conference_id' => $conference->id,
                    'date' => $date->format('Y-m-d'),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Conference updated successfully.',
            'data' => $conference,
        ], 200);
    }

    public function destroy($id)
    {
        $conference = Conference::find($id);

        if (!$conference) {
            return response()->json(['message' => 'Conference not found.'], 404);
        }

        $conference->delete();

        return response()->json([
            'success' => true,
            'message' => 'Conference deleted successfully.',
        ], 200);
    }
}
