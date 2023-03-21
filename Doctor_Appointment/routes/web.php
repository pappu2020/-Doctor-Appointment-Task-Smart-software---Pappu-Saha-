<?php

use App\Http\Controllers\appointmentController;
use App\Http\Controllers\doctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Apointment Page

Route::get("/",[appointmentController::class,"appointmentPage"])->name("appointmentPage");
Route::post("/appointmentPageDepartInfo",[appointmentController::class, "appointmentPageDepartInfo"]);
Route::post("/doctor_satusInfo",[appointmentController::class, "doctor_satusInfo"]);
Route::post("/doctor_PaysInfo",[appointmentController::class, "doctor_PaysInfo"]);


Route::post("/appoimentVerfication", [appointmentController::class, "appoimentVerfication"])->name("appoimentVerfication");
Route::get("/userInitialAppDelete/{id}", [appointmentController::class, "userInitialAppDelete"])->name("userInitialAppDelete");
Route::post("/finalSubmission", [appointmentController::class, "finalSubmission"])->name("finalSubmission");



//Doctor page


Route::get("/doctor", [doctorController::class, "doctorPage"])->name("doctorPage");
Route::post("/doctorStatus", [doctorController::class, "doctorStatus"])->name("doctorStatus");
