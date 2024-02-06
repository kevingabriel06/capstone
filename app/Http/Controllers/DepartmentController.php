<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function department(Request $request){
        dd (request()->all());
        $data = Department::all();
        return view('create-activity.department', ['data' => $data]);
    }
}
