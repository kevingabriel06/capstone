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

// Retrieve the existing attendance record for the student on the current activity
$attendance = Attendance::where([
    'activity_id' => $activity_id,
    'student_id' => $student_id,
])->first();

if ($attendance) {
    // Attendance record exists
    if (!is_null($attendance->time_in) && $attendance->attendance_status == 'Absent' && $attendance->student_id == $student_id) {
        // Update the existing attendance record with time_out
        $attendance->time_out = now(); // Use Laravel's helper function to get current date and time
        $attendance->save();
        return redirect()->back()->with('success', 'Time out recorded successfully.');
    }
} else {
    // Create new attendance record with activity_id, student_id, and current date for time_in
    Attendance::create([
        'activity_id' => $activity_id,
        'student_id' => $student_id,
        'time_in' => now(), // Use Laravel's helper function to get current date and time
        'attendance_status' => 'Absent', // Set status as Absent
    ]);
    return redirect()->back()->with('success', 'Time in recorded successfully.');
}
    
    }

    public function show()
    {
        $attendees = Attendance::with(['user', 'activity'])->get();
        
        return view('attendance.view', compact('attendees'));
    }
}

    

