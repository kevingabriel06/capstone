<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Assuming you're using Laravel's authentication system

        if ($user->user_role === 'admin' || $user->user_role === 'officer') {
            return view('dashboard.admin');
        }else {
            return view('dashboard.student');
        }

    }

}