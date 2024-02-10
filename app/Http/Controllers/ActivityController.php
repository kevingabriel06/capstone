<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Department;
use App\Models\Organization;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::all();

        return view('dashboard', ['activities'=> $activities]);
    }
    public function store(Request $request)
    {
        dd($request->all());
        // // Validate the incoming data
        // $data = $request->validate([
        //     'title' => 'required',
        //     'date_start' => 'required|date',
        //     'date_end' => 'required|date',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        //     'registration_deadline' => 'nullable|date',
        //     'registration_fee' => 'nullable|numeric',
        //     'description' => 'nullable',
        //     'image' => 'nullable',
        //     'department_name' => 'nullable|string|exists:departments,department_name',
        //     'organization_name' => 'nullable|string|exists:organizations,organization_name',
        //     // Add validation rules for other form fields
        // ]);

        // // Retrieve the department ID if a department name is provided, otherwise set it to null
        // $departmentId = $data['department_name'] ? Department::where('department_name', $data['department_name'])->value('department_id') : null;

        // // Retrieve the organization ID if an organization name is provided, otherwise set it to null
        // $organizationId = $data['organization_name'] ? Organization::where('organization_name', $data['organization_name'])->value('organization_id') : null;

        
        // // If only department name is provided, set organization ID to null
        // if ($data['department_name']) {
        //     $organizationId = null;
        // }
        // // If only organization name is provided, set department ID to null
        // elseif ($data['organization_name']) {
        //     $departmentId = null;
        // }
        // // If neither department nor organization names are provided, both IDs remain unchanged




        // // Insert the data into the target table along with department_id and organization_id
        // $newActivity = Activity::create([
        //     'title' => $data['title'],
        //     'date_start' => $data['date_start'],
        //     'date_end' => $data['date_end'],
        //     'start_time' => $data['start_time'],
        //     'end_time' => $data['end_time'],
        //     'registration_deadline' => $data['registration_deadline'],
        //     'registration_fee' => $data['registration_fee'],
        //     'description' => $data['description'],
        //     //'image' => $data['image'],
        //     'department_id' => $departmentId,
        //     'organization_id' => $organizationId,
        //     // Add other fields from the form as needed
        // ]);

        // return redirect(route('create-activity'))->with('success', 'Activity Saved!');
    }

    




}
