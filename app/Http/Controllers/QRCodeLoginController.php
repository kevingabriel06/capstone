<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QRCodeLoginController extends Controller
{
    public function qrloginindex(Request $request) {
        return view('student.qr-login');
    }




// public function checkUser(Request $request) {
//     $result = 0;

//     if ($request->data) {
//         $user = User::where('student_id',$request->data)->first();
//         if($user){
//             Auth::login($user);
//             $result=1;
//         } else {
//             $result=0;
//         }
//     }
//     return $result;
// }

// public function authenticate(Request $request)
//     {
//         // Extract student ID from the QR code data
//         // $studentId = $request->input('student_id');

//         // // Find the user with the provided student ID
//         // $user = User::where('student_id', $studentId)->first();

//     //     // If user exists, log in the user
//     //     if ($user) {
//     //         auth()->login($user);

//     //         // Redirect to the dashboard or any desired page
//     //         return redirect()->route('/community');
//     //     } else {
//     //         // User not found, handle the error (e.g., display an error message)
//     //         return redirect()->back()->with('error', 'Invalid student ID.');
//     //     }
//     }



    // public function authenticate(Request $request)
    // {
    //     $studentId = $request->input('student_id'); // Student ID scanned from QR code
    //     $user = User::where('student_id', $studentId)->first();

    //     if ($user && $user->user_role == 'student') {
    //         auth()->login($user); // Log in the user

    //         // Redirect to the student dashboard
    //         return redirect()->route('student.home')->with("success", "Student Login Successful");
    //     } else {
    //         // Invalid student ID or not a student role
    //         return redirect('/qr-login')->with('error', 'Invalid student ID or not authorized');
    //     }
    // }

// public function dashboard()
// {
//     if (auth()->check()) {
//         return view('student.dashboard');
//     } else {
//         return redirect('/qr-login');
//     }
// }


//     public function processQRCodelogin(Request $request)
//     {

//  // Assuming $qrCodeData contains the data from the scanned QR code
//      $qrData = json_decode($qrCodeData, true); // Assuming QR code data is in JSON format

//     $user = User::where('student_id', $qrData['student_id'])->first();

// if ($user) {
//     // User exists, update user information
//     $user->name = $qrData['name'];
//     $user->department = $qrData['department'];
//     $user->save();
// } else {
//     // User doesn't exist, create a new user
//     $user = new User();
//     $user->student_id = $qrData['student_id'];
//     $user->name = $qrData['name'];
//     $user->department = $qrData['department'];
//     $user->save();
// }

//     }



}
