<?php

namespace App\Http\Controllers;
use App\Models\Topic;

use App\Models\Activity;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $activities = Activity::all()->sortByDesc('activity_id');
        $topics = Topic::all()->sortByDesc('id'); 
       
        return view('student.home', ['topics' => $topics, 'activities' => $activities]);
    }

}
