<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot-password.html', function () {
    return view('forgot-password');
});


Route::get('/sidebar', function () {
    return view('navigation-bar');
});

Route::get('/create-activity.blade.php', function () {
    return view('create-activity');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/attendance.blade.php', function () {
    return view('attendance');
});

Route::get('/fines.blade.php', function () {
    return view('fines');
});

Route::get('/community.blade.php', function () {
    return view('community');
});

Route::get('/profile-settings.blade.php', function () {
    return view('profile-settings');
});