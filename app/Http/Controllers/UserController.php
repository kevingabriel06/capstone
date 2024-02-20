<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        if (auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])){
            return redirect('dashboard');
            $request->session()->regenerate();
            
        }
    }

    public function store(){
        return redirect('dashboard');
    }
}
