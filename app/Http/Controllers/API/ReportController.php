<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reccomendation;

class ReportController extends Controller
{
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'reportable_id' => 'required|integer',
            'reportable_type' => 'required|string',
            'reason' => 'required|string|max:1000',
        ]);

        $allowedModels = [
            'App\Models\User',
            'App\Models\Blog',
            'App\Models\Comment',
            'App\Models\Reccomendation',
        ];
        if (!in_array($validatedData['reportable_type'], $allowedModels)) {
            return response()->json(['message' => 'Invalid content type.'], 400);
        }

        if ($request->reportable_type == 'App\Models\Comment') {
            $commentFind = Comment::find($request->reportable_id);
            $reportedUser = $commentFind->user_id;
        }
        if ($request->reportable_type == 'App\Models\Reccomendation') {
            $reccomendationFind = Reccomendation::find($request->reportable_id);
            $reportedUser = $reccomendationFind->reccomended_by;
        }
        if ($request->reportable_type == 'App\Models\User') {
            $reportedUser = User::find($request->reportable_id);
            $reportedUser = $reportedUser->id;
        }

        $reportable = $validatedData['reportable_type']::find($validatedData['reportable_id']);

        if (!$reportable) {
            return response()->json(['message' => 'Content not found.'], 404);
        }

        $report = new Report();
        $report->user_id = Auth::id();
        $report->reported_user_id = $reportedUser;
        $report->reason = $validatedData['reason'];

        $reportable->reports()->save($report);
        return response()->json(['message' => 'Report submitted successfully.']);
    }

    public function index()
    {

        return ReportResource::collection(Report::all());
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();
        return response()->json([
            'success' => true,
            'message' => 'Reported Deleted'
        ]);
    }
}
