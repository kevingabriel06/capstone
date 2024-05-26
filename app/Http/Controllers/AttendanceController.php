<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Activity;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function index($activity_id)
    {
        // Find the activity
        $activity = Activity::findOrFail($activity_id);

        return view("attendance.scan", ['activity_id' => $activity_id, 'activity' => $activity]);
    }

    public function indexCap($activity_id)
    {
        // Find the activity
        $activity = Activity::findOrFail($activity_id);

        return view("attendance.capture", ['activity_id' => $activity_id, 'activity' => $activity]);
    }

    public function store(Request $request, $activity_id)
    {

        // Validate the request data
        $request->validate([
            'student_id' => 'required',
        ]);

        //Get the base64 image data from the request
        $base64image = $request->input('image');

        // Decode the base64 image data
        $imageData = base64_decode($base64image);

        // Save the image to a storage location (e.g., public storage)
        $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
        file_put_contents(public_path('imgCapture/' . $imageName), $imageData);


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
                'photo_path' => 'imgCapture/' . $imageName,
            ]);
            return redirect()->back()->with('success', 'Time in recorded successfully.');
        }

    }

    public function show()
    {
        $attendees = Attendance::with(['user', 'activity'])->get();

        return view('attendance.view', compact('attendees'));
    }

    public function capture(Request $request)
    {
        //Get the base64 image data from the request
        $base64image = $request->input('image');

        // Decode the base64 image data
        $imageData = base64_decode($base64image);

        // Save the image to a storage location (e.g., public storage)
        $imageName = date("Y.m.d") . " - " . date("h.i.sa") . ' .jpeg';
        file_put_contents(public_path('imgCapture/' . $imageName), $imageData);

        // Optionally, you can store the image data to a database if needed
        $photo = Photo::create([
            'photo_path' => 'imgCapture/' . $imageName,
            // Add other fields from the form as needed
        ]);


        //Return a response indicating success
        return response()->json(['message' => 'Image saved successfully', 'photo_path' => $imageName]);

    }

}



