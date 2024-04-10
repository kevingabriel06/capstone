<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AdminController;//

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

Route::group(['middleware'=>'prevent-back-history'],function(){

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/', [UserController::class, 'loginPost'])->name('login.post');



Route::middleware('auth','role:admin')->group(function(){

    Route::prefix('/admin')->group(function(){

    // ACTIVITY

        //CREATE
            Route::post('/create', [ActivityController::class, 'store'])->name('create.store');
            Route::get('/activity/create', [ActivityController::class, 'organizer'])->name('create');

        //READ
            Route::get('/dashboard', [ActivityController::class, 'index'])->name('home'); //homepage
            Route::get('/logout', [UserController::class, 'AdminLogout'])->name('admin.logout'); //logout

             // PROFILE SETTINGS
            Route::get('/profile-settings',[AdminController::class, 'settings'])->name('profilesettings'); //

            //Replace act id with token
            Route::get('/activity/details/{activity_id}', [ActivityController::class, 'show'])->name('activity-details');

        //EDIT
            Route::get('/activity/{activity}/edit', [ActivityController::class, 'edit'])->name('edit');
            Route::put('/activity/{activity}/update', [ActivityController::class, 'update'])->name('update');
            Route::post('update-profile',[AdminController::class,'updateInfo'])->name('adminUpdateInfo'); //j
            Route::post('change-password',[AdminController::class,'changePassword'])->name('changeAdminPassword'); //j


        //DELETE
            Route::get('/activity/{activity_id}', [ActivityController::class, 'delete'])->name('delete');


        Route::get('/capture-photo', function () {
            return view('capture-photo');
        });

    //ATTENDANCE

        //INSERT
            //Replace act id with token
            Route::get('/attendance/qr-scanner/scan/{activity_id}', [AttendanceController::class, 'index'])->name('qr-scanner');

            //qr-code
            Route::post('/attendance/scan/{activity_id}', [AttendanceController::class, 'store'])->name('attendance.scan');

            //capture-photo
            Route::post('/attendance/capture', [AttendanceController::class, 'capture'])->name('attendance.capture');
            Route::get('/attendance/capture/{activity_id}', [AttendanceController::class, 'indexCap'])->name('capture');

        //READ
            Route::get('/attendance/list', [AttendanceController::class, 'show'])->name('list');

        // COMMUNITY
            Route::get('/community', [TopicController::class, 'index'])->name('topics.index');
            Route::post('/community', [TopicController::class, 'store'])->name('topics.store');
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
// Route::get('/profile-settings', function () {
//     return view('profile-settings');
// });

// QR SCANNER


// CAPTURE PHOTO
Route::get('/capture', function () {
    return view('capture-photo');
});



//Officer and Student Dashboards
    Route::middleware(['auth','role:student'])->group(function(){
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.home'); //homepage
    });


    Route::middleware(['auth','role:officer'])->group(function(){
        Route::get('/officer/dashboard', [OfficerController::class, 'index'])->name('officer.home'); //homepage
        });


    }); //for PreventBackHistoryRoute
