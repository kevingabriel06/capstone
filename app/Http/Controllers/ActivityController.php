<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Models\Activity;
use App\Models\Department;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function index()
    {
        try {
            // Get all activities
            $activities = Activity::all()->sortByDesc('activity_id');
        
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

    public function activityIndex()
    {
        try {
           // Retrieve the authenticated user
            $user = Auth::user();

            // Get the department_id from the user
            $department_id = $user->department_id;

            // Pass the department_id to the view or use it in your controller logic
            return view('activity.create')->with('department_id', $department_id);
            
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
        try {
            $department_id = Auth::user()->department_id;
        
            // Merge department_id into the request data
            $requestData = $request->all();
            $requestData['department_id'] = $department_id;
        
            // Validate the incoming data
            $data = $request->validate([
                'title' => 'required|string|unique:activities,title',
                'date_start' => 'required|date|unique:activities,date_start',
                'date_end' => 'required|date|unique:activities,date_end',
                'am_in' => 'nullable|date_format:H:i',
                'am_out' => 'nullable|date_format:H:i',
                'pm_in' => 'nullable|date_format:H:i',
                'pm_out' => 'nullable|date_format:H:i',
                'registration_deadline' => 'nullable|date|date_format:Y-m-d',
                'registration_fee' => 'nullable|numeric',
                'description' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:50000',
            ]);
        
            // Handle image upload
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('uploads'), $imageName);
            } else {
                $imageName = null; // Set $imageName to null if no image is uploaded
            }
        
            // Determine the user role
            $userRole = Auth::user()->user_role;
        
            // Check if the user is an admin or officer
            if ($userRole === 'admin') {
                // Create new Activity instance for admin
                $newActivity = Activity::create([
                    'title' => $data['title'],
                    'date_start' => $data['date_start'],
                    'date_end' => $data['date_end'],
                    'am_in' => $data['am_in'],
                    'am_out' => $data['am_out'],
                    'pm_in' => $data['pm_in'],
                    'pm_out' => $data['pm_out'],
                    'registration_deadline' => $data['registration_deadline'],
                    'registration_fee' => $data['registration_fee'],
                    'description' => $data['description'],
                    'department_id' => $department_id, // Use department_id from validated data
                    'image_path' => $imageName ? 'uploads/' . $imageName : null, // Set image path or null
                ]);

                return redirect(route('home'))->with('success', 'Activity is Successfully Added');

            } elseif ($userRole === 'officer') {
                // Additional checks or actions specific to officers can be added here
                // For example, if officers have different permissions or restrictions
                // Create new Activity instance for officer
                $newActivity = Activity::create([
                    'title' => $data['title'],
                    'date_start' => $data['date_start'],
                    'date_end' => $data['date_end'],
                    'am_in' => $data['am_in'],
                    'am_out' => $data['am_out'],
                    'pm_in' => $data['pm_in'],
                    'pm_out' => $data['pm_out'],
                    'registration_deadline' => $data['registration_deadline'],
                    'registration_fee' => $data['registration_fee'],
                    'description' => $data['description'],
                    'department_id' => $department_id, // Use department_id from validated data
                    'image_path' => $imageName ? 'uploads/' . $imageName : null, // Set image path or null
                ]);

                return redirect(route('officer.home'))->with('success', 'Activity is Successfully Added');
            }

        } catch (\Exception $e) {
            // Handle other exceptions
            return view('error', ['error_message' => $e->getMessage()]);
        }
        
        }

    //showing some data sa activity details na page sa dashboard
    public function show($activity_id)
    {
        $activity = Activity::findOrFail($activity_id);
        $activities = Activity::all()->sortByDesc('actvity_id');
        $department = Department::findOrFail($activity->department_id);
        $departments = Department::all();
        
        return view('activity.show', ['activity' => $activity, 'department' => $department, 'activity_id' => $activity_id, 'activities' => $activities, 'departments' => $departments]);
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
            'title' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'am_in' => 'nullable|date_format:H:i',
            'am_out' => 'nullable|date_format:H:i',
            'pm_in' => 'nullable|date_format:H:i',
            'pm_out' => 'nullable|date_format:H:i',
            'am_in_cut' => 'nullable|date_format:H:i',
            'am_out_cut' => 'nullable|date_format:H:i',
            'pm_in_cut' => 'nullable|date_format:H:i',
            'pm_out_cut' => 'nullable|date_format:H:i',
            'registration_deadline' => 'nullable|date|date_format:Y-m-d',
            'registration_fee' => 'nullable|numeric',
            'description' => 'nullable',
        ]);

        // Validate the incoming image data
        $imageData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Determine the route based on user role
        $route = Auth::user()->user_role === 'admin' ? 'home' : 'officer.home';

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
        return redirect(route($route))->with('success', 'Activity is Successfully Updated');
    }


    public function delete($activity_id)
    {
        $activity = Activity::findOrFail($activity_id);
        $activity->delete();

        return redirect(route('home'))->with('success', 'Activity is Successfully Deleted');
    }
        
}
            