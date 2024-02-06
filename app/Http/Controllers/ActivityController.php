<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Department;

class ActivityController extends Controller
{
    public function activityCreate(){
        return view("create-activity");
    }

    public function store(Request $request){
        $data = $request->validate([
            'title'=> 'required',
            'date_start'=> 'required|date|after:tomorrow',
            'start_time'=> 'required',
            'date_end'=> 'required|date|after:date_start',
            'end_time'=> 'required',
            'registration_deadline'=> 'date|after:tomorrow',
            'registration_fee'=> 'numeric',
            'description'=> 'nullable',
            'status'=> 'nullable',
            'department_id'=> 'nullable',
            'image'=> 'nullable',
            'organization_id'=> 'nullable',


        ]);

        $newActivity = Activity::create( $data );

        return redirect(route('create-activity'));
    }

}
