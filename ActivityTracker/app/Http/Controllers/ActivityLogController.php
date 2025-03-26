<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    // Show all activity logs
    public function index()
    {
        $logs = ActivityLog::with(['activity', 'user'])->get();
        return response()->json($logs);
    }
    
}
