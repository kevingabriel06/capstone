<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
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
            $activities = Activity::all();
            return view('dashboard', ['activities' => $activities]);
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
            // Validate the incoming data
            $data = $request->validate([
                'title' => 'required',
                'date_start' => 'required|date',
                'date_end' => 'required|date',
                'start_time' => 'required',
                'end_time' => 'required',
                'registration_deadline' => 'nullable|date',
                'registration_fee' => 'nullable|numeric',
                'description' => 'nullable',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'department_name' => 'required|string|exists:departments,department_name',
                // Add validation rules for other form fields
            ]);
    
            // Get the department ID based on the provided department name
            $departmentId = Department::where('department_name', $data['department_name'])->value('department_id');
    
            // Handle image upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
    
            // Create new Activity instance
            $newActivity = Activity::create([
                'title' => $data['title'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'registration_deadline' => $data['registration_deadline'],
                'registration_fee' => $data['registration_fee'],
                'description' => $data['description'],
                'department_id' => $departmentId, // Set department ID
                //'organization_id' => null, // Assuming department is the organizer, set organization ID to null
                'image_path' => 'uploads/' . $imageName,
                // Add other fields from the form as needed
            ]);
    
            return redirect(route('home'))->with('success', 'Activity is Successfully Added');

        // } catch (ValidationException $e) {
        //     // Redirect back with validation errors
        //     return redirect()->back()->withErrors($e->errors())->withInput();
        // } catch (ModelNotFoundException $e) {
        //     // Handle model not found errors
        //     return redirect()->back()->with('error', 'Invalid department selected.');
        // } catch (\Exception $e) {
        //     // Handle other exceptions
        //     return view('error', ['error_message' => $e->getMessage()]);
        // }
    }

    //showing some data sa activity details na page sa dashboard
    public function show($activity_id)
    {
        //try {
            $activity = Activity::findOrFail($activity_id);
            $activities = Activity::all();
            $department = Department::findOrFail($activity->department_id);
            $departments = Department::all();
            
            return view('activity.show', ['activity' => $activity, 'department' => $department, 'activity_id' => $activity_id, 'activities' => $activities, 'departments' => $departments]);
        // } catch (ModelNotFoundException $e) {
        //     // Handle model not found errors
        //     return view('error', ['error_message' => 'Activity or Department not found.']);
        // } catch (\Exception $e) {
        //     // Handle other exceptions
        //     return view('error', ['error_message' => $e->getMessage()]);
        // }
    }
        
    
    

    




}
