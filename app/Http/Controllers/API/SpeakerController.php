<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerRequest;
use App\Http\Resources\SpeakerResource;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    public function store(SpeakerRequest $request)
    {
        $speaker = new Speaker;
        $speaker->info = $request->info;
        $speaker->title = $request->title;
        $speaker->social_media = $request->social_media;
        $speaker->is_special = $request->is_special;
        $imageName = time() . '.' . $request->file('img')->extension();
        $imagePath = $request->file('img')->move(public_path('speakerImages/' . $speaker->id), $imageName);
        $speaker->img = 'speakerImages/' . $speaker->id . '/' . $imageName;
        $speaker->name = $request->name;
        $speaker->last_name = $request->last_name;
        $speaker->save();

        return response()->json([
            'success' => true,
            'message' => 'Speaker Added',
        ]);
    }

    public function index()
    {
        $speakers = Speaker::all();
        return SpeakerResource::collection($speakers);
    }
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();
        return response()->json([
            'success' => true,
            'message' => 'Speaker has been deleted',
        ]);
    }
    public function show($id)
    {
        $speaker = Speaker::findOrFail($id);
        return new SpeakerResource($speaker);
    }

    public function update(Request $request, $id)
    {
        $speaker = Speaker::findOrFail($id);

        if ($request->has('info')) {
            $speaker->info = $request->info;
        }

        if ($request->has('title')) {
            $speaker->title = $request->title;
        }

        if ($request->has('social_media')) {
            $speaker->social_media = $request->social_media;
        }

        if ($request->has('is_special')) {
            $speaker->is_special = $request->is_special;
        }

        if ($request->has('name')) {
            $speaker->name = $request->name;
        }

        if ($request->has('last_name')) {
            $speaker->last_name = $request->last_name;
        }

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->file('img')->extension();
            $imagePath = $request->file('img')->move(public_path('speakerImages/' . $speaker->id), $imageName);
            $speaker->img = 'speakerImages/' . $speaker->id . '/' . $imageName;
        }

        $speaker->save();

        return response()->json([
            'success' => true,
            'message' => 'Speaker updated successfully',
        ]);
    }
}
