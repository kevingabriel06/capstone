<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\QRCodeController;
use App\Models\Activity;



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

//start

// LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    // Process login data
});


// ACTIVITY 
Route::prefix('/admin')->group(function(){
    
    //CREATE
    Route::post('/create-activity', [ActivityController::class, 'store'])->name('create-activity.store');
    Route::get('/create-activity', [ActivityController::class, 'organizer'])->name('create-activity.organizer');

    //READ
    Route::get('/dashboard', [ActivityController::class, 'index'])->name('dashboard.index');

    //Replace act id with token
    Route::get('/activity-details/{activity_id}', [ActivityController::class, 'show'])->name('activity-details');
    Route::get('/qr-scanner', function () {
        return view('qr-scanner');
    });
    Route::get('/capture-photo', function () {
        return view('capture-photo');
    });
});



// SIDEBAR
Route::get('/sidebar', function () {
    return view('navigation-bar');
});

// ATTENDANCE
Route::get('/attendance', function () {
    return view('attendance');
});

// FINES
Route::get('/fines', function () {
    return view('fines');
});

// COMMUNITY
Route::get('/community', function () {
    return view('community');
});

// PROFILE SETTINGS
Route::get('/profile-settings', function () {
    return view('profile-settings');
});

// QR SCANNER


// CAPTURE PHOTO



