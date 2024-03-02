<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController; 





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
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'loginPost'])->name('login.post');



Route::middleware("auth")->group(function(){

    Route::prefix('/admin')->group(function(){

    // ACTIVITY 

        //CREATE
            Route::post('/create', [ActivityController::class, 'store'])->name('create.store');
            Route::get('/activity/create', [ActivityController::class, 'organizer'])->name('create');

        //READ
            Route::get('/dashboard', [ActivityController::class, 'index'])->name('home'); //homepage

            //Replace act id with token
            Route::get('/activity/details/{activity_id}', [ActivityController::class, 'show'])->name('activity-details');




        Route::get('/capture-photo', function () {
            return view('capture-photo');
        });

    //ATTENDANCE

        //INSERT
            //qr-code
            Route::get('/attendance/qr-scanner', [AttendanceController::class, 'index'])->name('qr-scanner');
            Route::post('/attendance/scan', [AttendanceController::class, 'store'])->name('attendance.scan');

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



