<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department; //
use App\Models\Activity; //
use App\Models\Organization;

class ExcuseApplicationController extends Controller
{
    public function index()
    {

        $departments = Department::all();
        return view('excuseapplication' , ['departments' => $departments]);

}


public function adminindex()
    {
       // $activity = Activity::findOrFail($activity_id);
        $activities = Activity::all()->sortByDesc('actvity_id');
        //$department = Department::findOrFail($activity->department_id);
        $departments = Department::all();

        return view('excuseapplicationadmin');


      //  return view('excuseapplicationadmin');

}
}
