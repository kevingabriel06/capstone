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

// sa pagkuha to ng data sa database yung sa department at organization table
Route::get("/create-activity", [OrganizerController::class, "index"])->name("create-activity-organizer");

//dashboard
Route::get("/dashboard", [ActivityController::class,"index"])->name("dashboard.index");

//are naman ay sa activity table
Route::post("/create-activity", [ActivityController::class, "store"])->name("create-activity.store");
//Route::post("/create-activity", [OrganizerController::class, "store"])->name("create-activity.store");

Route::post("/create-activity$", [ActivityController::class, "show"])->name("create-activity.show");
