<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Activity;

class AttendanceController extends Controller
{
 
    public function index($activity_id)
    {
        // Find the activity
        $activity = Activity::findOrFail($activity_id);

        return view("attendance.scan", ['activity_id' => $activity_id, 'activity' => $activity]);
    }


    public function store(Request $request, $activity_id)
    {
        // Validate the request data
        $request->validate([
            'student_id' => 'required',
        ]);

        // Retrieve student_id from the request
        $student_id = $request->input('student_id');

        // Check if attendance for the student on the current activity already exists
        $check = Attendance::where([
            'activity_id' => $activity_id,
            'student_id' => $student_id,
            'time_in' => date(NOW()), // Use Laravel's helper function to get current date in Y-m-d format
        ])->first();

        if ($check) {
            return redirect()->back()->with('success', 'Attendance already recorded for this student.');
        }

        // Create new attendance record with activity_id, student_id, and current date
        Attendance::create([
            'activity_id' => $activity_id,
            'student_id' => $student_id,
            'date' => date(NOW()) // Use Laravel's helper function to get current date in Y-m-d format
        ]);

        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }

    public function show()
    {
        $attendees = Attendance::with(['user', 'activity'])->get();

        return view('attendance.view', compact('attendees'));
    }
}

    

