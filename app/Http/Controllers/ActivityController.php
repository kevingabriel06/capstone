<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::all();

        return view('dashboard', ['activities'=> $activities]);
    }
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'date_start'=> 'required|date',
            'date_end'=> 'required|date',
            'start_time'=> 'required',
            'end_time'=> 'required',
            'registration_deadline'=> 'date',
            'registration_fee'=> 'numeric',
            'department_id'=> 'numeric',
            'description'=> 'nullable',
            'image'=> 'nullable',
        ]);

        $newActivity = Activity::create($data);

        return redirect(route('create-activity'))->with('success','Activity Saved!');

    }

}
