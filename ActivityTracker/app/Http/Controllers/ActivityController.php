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
        $activities = Activity::with('user')->orderBy('updated_at', 'desc')->get();
        return view('activities.activities', compact('activities')); // Ensure the view path is correct
    }

    // Store a new activity
        public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required|string|max:255',
            'sms_count' => 'nullable|integer',
            'log_sms_count' => 'nullable|integer',
            'status' => 'nullable|string|in:pending,done',
            'remark' => 'nullable|string',
        ]);

        // Save to Database
        Activity::create([
            'name' => $request->name,
            'sms_count' => $request->sms_count,
            'log_sms_count' => $request->log_sms_count,
            'status' => $request->status ?? 'pending',
            'remark' => $request->remark,
        ]);

        // Redirect to activities list with success message
        return redirect()->route('activities.index')->with('success', 'Activity added successfully!');
    }


    // Show a specific activity
    public function show($id)
    {
        $activity = Activity::find($id);

        if (!$activity) {
            return response()->json(['error' => 'Activity not found'], 404);
        }

        return response()->json($activity);
    }

    // Update an activity
        public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        // Validate Input (optional: remove 'required' to allow optional fields)
        $request->validate([
            'name' => 'required|string|max:255',
            'sms_count' => 'nullable|integer',
            'log_sms_count' => 'nullable|integer',
            'status' => 'nullable|string|in:pending,done',
            'remark' => 'nullable|string',
        ]);

        // Update Activity
        $activity->update([
            'name' => $request->name,
            'sms_count' => $request->sms_count,
            'log_sms_count' => $request->log_sms_count,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        // Redirect back to activities list
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }

    
    // Delete an activity
        public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }



    // Show today's activities
    // Show today's activities
    public function dailyActivities()
    {
        $today = now()->toDateString(); // Get today's date in YYYY-MM-DD format

        // Fetch activities that were updated today
        $activities = Activity::whereDate('updated_at', $today)
            ->with('user') // Assuming there is a User relationship
            ->get();

        // Return the activities view with the activities data
        return view('activities.daily', compact('activities'));
    }


    // Generate activity report for a date range
    public function activityReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $activities = Activity::whereBetween('updated_at', [$startDate, $endDate])
            ->with('user')
            ->get();

        return response()->json($activities);
    }

    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access these methods
    }// updae

    // In ActivityController.php

    public function generateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Retrieve activities within the specified date range
        $activitiesReport = Activity::whereBetween('updated_at', [$startDate, $endDate])
            ->with('user') // Eager load the related user
            ->get();

        // Pass the activities to the view along with the start and end dates
        return view('activities.report', compact('activitiesReport', 'startDate', 'endDate'));
    }

        public function search(Request $request)
    {
        $query = $request->input('query');

        $activities = Activity::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%'])
            ->orWhereRaw('LOWER(status) LIKE ?', ['%' . strtolower($query) . '%'])
            ->get();

        return view('activities.activities', compact('activities'));
    }

        public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

}
