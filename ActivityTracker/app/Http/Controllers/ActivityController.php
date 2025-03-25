<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // Show all activities
    public function index()
    {
        $activities = Activity::with('user')->get();
        return response()->json($activities);
    }

    // Store a new activity
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        Activity::create([
            'name' => $request->name,
            'user_id' => null, // Remove Auth::id()
        ]);
    
        return response()->json(['message' => 'Activity created successfully!']);
    }
    

    // Show a specific activity
    public function show($id)
    {
        $activity = Activity::with('user')->findOrFail($id);
        return response()->json($activity);
    }

    // Update an activity
    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,done',
            'remark' => 'nullable|string',
        ]);

        $activity->update($request->only('status', 'remark'));

        // Log the update
        ActivityLog::create([
            'activity_id' => $activity->id,
            'user_id' => Auth::id(),
            'action' => 'Updated activity status',
            'remark' => $request->remark,
        ]);

        return response()->json(['message' => 'Activity updated', 'activity' => $activity]);
    }

    // Delete an activity
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return response()->json(['message' => 'Activity deleted']);
    }
}
