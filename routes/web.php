<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\QRCodeController;
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

//start

//LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/dashboard', function () {
    return view('dashboard');
});

// sa pagkuha to ng data sa database yung sa department at organization table


//dashboard
Route::get("/dashboard", [ActivityController::class,"index"])->name("dashboard.index");

//are naman ay sa activity table
Route::post("/create-activity", [ActivityController::class, "store"])->name("create-activity.store");
//Route::post("/create-activity", [OrganizerController::class, "store"])->name("create-activity.store");


//Route::get("/qr-scanner", [QRCodeController::class, "processQRCode"])->name("qr-scanner");

Route::get('/sidebar', function () {
    return view('navigation-bar');
});

//create an activity route


//ito yung comment mo neil
Route::get('/create-activity', [ActivityController::class, 'activityCreate'])->name('create-activity');
Route::post('/create-activity/store', [ActivityController::class, 'store'])->name('create-activity.store');

//Route::get('/create-activity', [ActivityController::class, 'activityCreate'])->name('create-activity');
//Route::post('/create-activity/store', [ActivityController::class, 'store'])->name('create-activity.store');



Route::get('/attendance.blade.php', function () {
    return view('attendance');
});

// Route::get('/create-activity', function () {
//     return view('create-activity');
// });

Route::get('/fines.blade.php', function () {
    return view('fines');
});

Route::get('/community.blade.php', function () {
    return view('community');
});

Route::get('/profile-settings.blade.php', function () {
    return view('profile-settings');
});


Route::get('/qr-scanner', function () {
    return view('qr-scanner');
});