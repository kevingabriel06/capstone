<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\OrganizerController;
use App\Models\Organization;


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

Route::get('/login', function () {
    return view('login');
});

Route::post('/dashboard', function () {
    return view('dashboard');
});

// sa pagkuha to ng data sa database yung sa department at organization table
Route::get("/create-activity", [OrganizerController::class, "index"])->name("create-activity-organizer");

//dashboard
Route::get("/dashboard", [ActivityController::class,"index"])->name("dashboard.index");

//are naman ay sa activity table
Route::post("/create-activity", [ActivityController::class, "store"])->name("create-activity.store");
//Route::post("/create-activity", [OrganizerController::class, "store"])->name("create-activity.store");


Route::post("/create-activity$", [ActivityController::class, "show"])->name("create-activity.show");



Route::get('/sidebar', function () {
    return view('navigation-bar');
});

//create an activity route
Route::get('/create-activity', [ActivityController::class, 'activityCreate'])->name('create-activity');
Route::post('/create-activity/store', [ActivityController::class, 'store'])->name('create-activity.store');


Route::get('/activity-details.blade.php', function () {
    return view('activity-details');
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