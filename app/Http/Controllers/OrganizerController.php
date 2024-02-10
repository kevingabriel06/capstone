<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Organization;
use App\Models\Activity;

class OrganizerController extends Controller
{
    public function index(){
        $departments = Department::all();
        $organizations = Organization::all();
    
        return view('create-activity', compact('departments', 'organizations'));
    }
    
}
