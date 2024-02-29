<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index(){
        return view("qr-scanner");
    }
    public function store(Request $request)
    {
        $text = $request->input('text');

        $data = explode('&', $text);

        $student_id = $data[0];
        $name = $data[1];
        $department = $data[2];

        //check data
        $check = Attendance::where([
            'student_id' => $student_id,
            'name' => $name,
            'department' => $department,
            'time_in' => date('Y.m.d')
        ])->first();

        if ($check){
            return redirect('admin/dashboard')->with('success', 'Data Added Successfully');
        }

        Attendance::create([
            'student_id' => $student_id,
            'name' => $name,
            'department' => $department,
            'time_in' => date('Y.m.d')
        ]);

        return redirect('admin/dashboard')->with('success', 'Data Added');
    }

}
    

