<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function loginPost(Request $request){
        $request->validate([
            'student_id' => ['required', 'min:3', 'max:8'],
            'password' => ['required', 'min:8', 'max:200']]);


        $credentials = $request ->only("student_id", "password");

        if (auth()->attempt($credentials)){
            
            return redirect()->intended(route('home'))->with("success", "Admin Login Successful");

        }
        return redirect(route("login"))->with("error","Login Unsuccessful" );

       
    }


    public function login(Request $request){
       return view('auth.login');
    }

    public function store(){
        return redirect('dashboard');
    }
}
