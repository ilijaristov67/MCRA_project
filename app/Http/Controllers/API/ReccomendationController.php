<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReccomendationResource;
use App\Http\Requests\ReccomendationRequest;
use App\Models\Reccomendation;
use App\Http\Requests\UpdateReccomendationRequest;
use App\Models\Report;

class ReccomendationController extends Controller
{
    public function store(ReccomendationRequest $request)
    {

        $reccomendation = Reccomendation::create([
            'reccomendation' => $request->reccomendation,
            'user_id' => $request->user_id,
            'reccomended_by' => $request->reccomended_by,
        ]);

        if ($reccomendation) {
            return response()->json([
                'success' => true,
                'message' => 'Reccomendation given',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Reccomendation was not saved',
            ]);
        }
    }

    public function index($id)
    {
        $reccomendations = Reccomendation::with('reccomender')->where('user_id', $id)->get();
        return ReccomendationResource::collection($reccomendations);
    }

    public function updateReccomendation($id)
    {
        $reccomendation = Reccomendation::findOrFail($id);
        $reccomendation->is_approved = 1;
        $reccomendation->save();
        return response()->json([
            'success' => true,
            'message' => 'Reccomendation approved',
        ]);
    }
    public function destroy($id)
    {
        Report::where('reportable_id', $id)
            ->where('reportable_type', Reccomendation::class)
            ->delete();

        $reccomendation = Reccomendation::findOrFail($id);
        $reccomendation->delete();
        return response()->json([
            'success' => true,
            'message' => 'Reccomendation deleted',
        ]);
    }

    public function show($id)
    {
        $reccomendation = Reccomendation::findOrFail($id);
        return new ReccomendationResource($reccomendation);
    }

    public function update(UpdateReccomendationRequest $request, $id)
    {
        $reccomendation = Reccomendation::findOrFail($id);
        $reccomendation->reccomendation = $request->reccomendation;
        $reccomendation->is_approved = 0;
        $reccomendation->save();
        return response()->json([
            'success' => true,
            'message' => 'Reccomendation updated',
        ]);
    }
}
