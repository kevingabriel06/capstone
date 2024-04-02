<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse; //added this for logout
use Illuminate\Support\Facades\Auth; // added this for logout

class UserController extends Controller
{

    public function loginPost(Request $request){
        $request->validate([
            'student_id' => ['required', 'min:3', 'max:8'],
            'password' => ['required', 'min:8', 'max:200']]);


        $credentials = $request->only("student_id", "password");

        if (auth()->attempt($credentials)){

            $url = '';

            if($request->user()->user_role== 'admin') { //added this code

            return redirect()->intended(route('home'))->with("success", "Admin Login Successful");
            }  else if($request->user()->user_role== 'officer') { //added this code

                return redirect()->intended(route('officer.home'))->with("success", "Officer Login Successful");
                } else if($request->user()->user_role== 'student') { //added this code

                    return redirect()->intended(route('student.home'))->with("success", "Student Login Successful");
                    }

        }
        return redirect(route("login"))->with("error","Login Unsuccessful" );


    }


    public function login(Request $request){
       return view('auth.login');
    }

    public function store(){
        return redirect('dashboard');
    }

     //added logout session
     public function AdminLogout(Request $request): RedirectResponse
     {
         Auth::guard('web')->logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect()->intended(route('login'))->with("success", "Logout Successful");
     }
}
