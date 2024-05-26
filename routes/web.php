<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AdminController;//
use App\Http\Controllers\ExcuseApplicationController;
use App\Http\Controllers\QRCodeLoginController;//


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
            Route::get('/activity/create', [ActivityController::class, 'activityIndex'])->name('create');

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

            //excuse application

            Route::get('/excuseapplication', [ExcuseApplicationController::class, 'index'])->name('excuseapp'); //homepage
            Route::get('/adminexcuseapplication', [ExcuseApplicationController::class, 'adminindex'])->name('adminexcuseapp'); //homepage

});


});




//Officer and Student Dashboards
    Route::middleware(['auth','role:student'])->group(function(){
        Route::get('/student/home', [StudentController::class, 'index'])->name('student.home'); //homepage
        });

        // OFFICER ROUTES
        Route::middleware(['auth','role:officer'])->group(function(){
            Route::prefix('/officer')->group(function(){

                // ACTIVITY

                // CREATE
                Route::post('/create/{department_id}', [ActivityController::class, 'store'])->name('officer.create.store');
                Route::get('/activity/create/{department_id}', [ActivityController::class, 'activityIndex'])->name('officer.create');

                // READ
                Route::get('/dashboard', [ActivityController::class, 'index'])->name('officer.home'); // homepage
                Route::get('/logout', [UserController::class, 'AdminLogout'])->name('officer.logout'); // logout

                // Replace act id with token
                Route::get('/activity/details/{activity_id}', [ActivityController::class, 'show'])->name('officer.activity-details');

                // EDIT
                Route::get('/activity/{activity}/edit', [ActivityController::class, 'edit'])->name('officer.edit');
                Route::put('/activity/{activity}/update', [ActivityController::class, 'update'])->name('officer.update');

                // DELETE
                Route::get('/activity/{activity_id}', [ActivityController::class, 'delete'])->name('officer.delete');

                Route::get('/capture-photo', function () {
                    return view('capture-photo');
                });

                // ATTENDANCE

                // INSERT
                // Replace act id with token
                Route::get('/attendance/qr-scanner/scan/{activity_id}', [AttendanceController::class, 'index'])->name('officer.qr-scanner');

                // qr-code
                Route::post('/attendance/scan/{activity_id}', [AttendanceController::class, 'store'])->name('officer.attendance.scan');

                // capture-photo
                Route::post('/attendance/capture', [AttendanceController::class, 'capture'])->name('officer.attendance.capture');
                Route::get('/attendance/capture/{activity_id}', [AttendanceController::class, 'indexCap'])->name('officer.capture');

                // READ
                Route::get('/attendance/list', [AttendanceController::class, 'show'])->name('officer.list');

                // COMMUNITY
                Route::get('/community', [TopicController::class, 'index'])->name('officer.topics.index');
                Route::post('/community', [TopicController::class, 'store'])->name('officer.topics.store');

            });

        });



}); //for PreventBackHistoryRoute
