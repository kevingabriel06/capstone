<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Organization;

class DepartmentController extends Controller
{
    public function indexDept(){
        $departments = Department::all();

        return view('create-activity', ['departments'=> $departments]);
    }

    
}
