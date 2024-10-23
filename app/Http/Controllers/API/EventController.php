<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function store(EventRequest $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->theme = $request->theme;
        $event->description = $request->description;
        $event->objectives = $request->objectives;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->ticket_price = $request->ticket_price;

        $dateCarbon = Carbon::parse($request->date);
        $day = $dateCarbon->format('l');
        $event->day = $day;
        $event->save();
        foreach ($request->eventSpeakers as $speaker) {
            $event->speakers()->attach($speaker);
        }
        return response()->json([
            'success' => true,
            'message' => 'Event Saved'
        ]);
    }
    public function index()
    {
        $events = Event::with(['speakers', 'eventAgendas'])->get();
        return EventResource::collection($events);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json([
            'success' => true,
            'message' => 'Event Deleted',
        ]);
    }
    public function show($id)
    {
        $event = Event::with('speakers')->find($id);
        return new EventResource($event);
    }

    public function update(Request $request, $id)
    {

        $event = Event::find($id);

        if ($request->has('title') && !is_null($request->input('title'))) {
            $event->title = $request->input('title');
        }

        if ($request->has('theme') && !is_null($request->input('theme'))) {
            $event->theme = $request->input('theme');
        }

        if ($request->has('description') && !is_null($request->input('description'))) {
            $event->description = $request->input('description');
        }

        if ($request->has('objectives') && !is_null($request->input('objectives'))) {
            $event->objectives = $request->input('objectives');
        }

        if ($request->has('date') && !is_null($request->input('date'))) {
            $event->date = $request->input('date');
        }

        if ($request->has('location') && !is_null($request->input('location'))) {
            $event->location = $request->input('location');
        }

        if ($request->has('ticket_price') && !is_null($request->input('ticket_price'))) {
            $event->ticket_price = $request->input('ticket_price');
        }

        $event->save();

        if ($request->has('eventSpeakers') && !is_null($request->input('eventSpeakers'))) {
            $event->speakers()->sync($request->eventSpeakers);
        }
        return response()->json(['success' => true, 'message' => 'Event updated successfully!', 'data' => $event]);
    }
}
