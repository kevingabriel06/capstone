<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Models\Activity;
use App\Models\Department;
use App\Models\Organization;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function index()
    {
        try {
            // Get all activities
            $activities = Activity::all();
        
            // Get the start and end dates for this month
            $startOfThisMonth = Carbon::now()->startOfMonth();
            $endOfThisMonth = Carbon::now()->endOfMonth();
        
            // Get the start and end dates for last month
            $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
            $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        
            // Count all activities from this month and last month
            $activityCountThisMonth = Activity::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count();
            $activityCountLastMonth = Activity::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        
            return view('dashboard', compact('activities', 'activityCountThisMonth', 'activityCountLastMonth'));
        } catch (QueryException $e) {
            // Handle database query exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        } catch (\Exception $e) {
            // Handle other exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        }
        
    }

    public function organizer()
    {
        try {
            $departments = Department::all();
            $organizations = Organization::all();
            return view('activity.create', compact('departments', 'organizations'));
        } catch (QueryException $e) {
            // Handle database query exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        } catch (\Exception $e) {
            // Handle other exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        }
    }

    //inserting data sa database sa create-activity na page
    public function store(Request $request)
    {
       // try {
       // try {
            // dd($request->all());

       try {
            // Validate the incoming data
            $data = $request->validate([
                'title' => 'required',
                'date_start' => 'required|date',
                'date_end' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required',
                'registration_deadline' => 'nullable|date|date_format:Y-m-d',
                'registration_fee' => 'nullable|numeric',
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
                'department_name' => 'required|string|exists:departments,department_name',
                // Add validation rules for other form fields
            ]);
    
            // Get the department ID based on the provided department name
            $departmentId = Department::where('department_name', $data['department_name'])->value('department_id');
            
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('uploads'), $imageName);
            } else {
                $imageName = null; // Set $imageName to null if no image is uploaded
            }
            
            
            // Create new Activity instance
            $newActivity = Activity::create([
                'title' => $data['title'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                'start_time' =>  $data['start_time'],//$startTime24hr,
                'end_time' =>  $data['end_time'],//$endTime24hr,
                'registration_deadline' => $data['registration_deadline'],
                'registration_fee' => $data['registration_fee'],
                'description' => $data['description'],
                'department_id' => $departmentId, // Set department ID
                //'organization_id' => null, // Assuming department is the organizer, set organization ID to null
                'image_path' => 'uploads/' . $imageName,
                // Add other fields from the form as needed
            ]);
            
            return redirect(route('home'))->with('success', 'Activity is Successfully Added');
    
        } catch (ValidationException $e) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            // Handle model not found errors
            return redirect()->back()->with('error', 'Invalid department selected.');
        } catch (\Exception $e) {
            // Handle other exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        }
    }

    //showing some data sa activity details na page sa dashboard
    public function show($activity_id)
    {
        $activity = Activity::findOrFail($activity_id);
        $activities = Activity::all()->sortByDesc('activity_id');
        $department = Department::findOrFail($activity->department_id);
        $departments = Department::all();
        
        return view('activity.show', ['activity' => $activity, 'department' => $department, 'activity_id' => $activity_id, 'activities' => $activities, 'departments' => $departments], 'activities');
    }
    
    public function edit(Activity $activity)
    {
        $departments = Department::all();

        return view('activity.edit', ['activity' => $activity, 'departments' => $departments]);
    }

    public function update(Activity $activity, Request $request)
    {
        // Validate the incoming data
        $data = $request->validate([
            'title' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'registration_deadline' => 'nullable|date|date_format:Y-m-d',
            'registration_fee' => 'nullable|numeric',
            'description' => 'nullable',
            // Add validation rules for other form fields
        ]);


        $validatedData = $request->validate([
            'department_name' => 'required|string|exists:departments,department_name',
        ]);

        // Get the department ID based on the provided department name
        $departmentId = Department::where('department_name', $validatedData['department_name'])->value('department_id');

        // Update the activity data
        $activity->update([
            'department_id' => $departmentId,
        ]);


        // Validate the incoming image data
        $imageData = $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle image upload if an image is provided
        if ($request->hasFile('image')) {
            // If image validation passes and an image is uploaded, proceed with image upload
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads'), $imageName);

            // Update the activity with the new image path
            $activity->update([
            'image_path' => 'uploads/' . $imageName,
            ]);
        } else {
        // If no new image uploaded or validation fails, retain the existing image path
        $imageName = $activity->image_path;
        }

        // Update the activity data
        $activity->update($data);

        // Redirect back with success message
        return redirect(route('home'))->with('success', 'Activity is Successfully Updated');
    }


    public function delete($activity_id)
    {
        $activity = Activity::findOrFail($activity_id);
        $activity->delete();

        return redirect(route('home'))->with('success', 'Activity is Successfully Deleted');
    }
        
}
            