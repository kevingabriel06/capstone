<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;//
use Illuminate\Http\Request;
use App\Models\User; //
use App\Models\Department; //
use Illuminate\Support\Facades\Validator; //
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller


{


    public function settings()
    {


        // Retrieve the authenticated user
        // $user = Auth::user();

        // // Retrieve the department associated with the user
        // $departmentName = $user->department->department_name;

        // return view('profile-settings', compact('user', 'departmentName'));
        return view('profile-settings');

    }

    function updateInfo(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'department' => 'required'


        ]);

        if($validator->fails()){

            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);

        }else{

            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,


            ]);

            if(!$query){
            return response()->json(['status'=>0, 'msg'=>'Something went wrong...']);
            } else {
                return response()->json(['status'=>1, 'msg'=>'Profile has been updated successfully!']);
            }
        }

    }




    function changePassword(Request $request){
        $validator = Validator::make($request->all(),[

            //name of the input types
            'oldpassword' => ['required', function($attribute, $value, $fail){
                if( !Hash::check($value, Auth::user()->password)){
                    return $fail(__('The current password is incorrect'));
                }
            },
            'min:8',
            'max:30'

        ],



            'newpassword' => 'required|min:8|max:30',
            'confirmpassword' => 'required|same:newpassword',

         ],[
            'oldpassword.required'=>'Enter your current pssword',
            'newpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Password too long',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 8 characters',
            'newpassword.max'=>'Password too long',
            'confirmpassword.required'=>'Re-enter your new password',
            'confirmpassword.same'=>'New password and Confirm password must match',


        ]);

        if($validator->fails()){

            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);

        }else{

            $update = User::find(Auth::user()->id)->update([
                'password'=>Hash::make($request->newpassword),



            ]);

            if(!$update){
            return response()->json(['status'=>0, 'msg'=>'Failed to update password']);
            } else {
                return response()->json(['status'=>1, 'msg'=>'Password has been updated successfully!']);
            }
        }

    }

}
