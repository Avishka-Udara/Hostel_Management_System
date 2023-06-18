<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostelRegistrationController;
//use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WelcomeController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [WelcomeController::class, 'user'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/registeredstudents', [HomeController::class, 'show'])->name('registering-students');

Route::resource('rooms', RoomController::class);
Route::post('/enroll', [EnrollmentController::class, 'enrollUser'])->name('enroll.user');


//Route::get('/notifications/{id}/mark-as-read', [HomeController::class, 'markNotificationAsRead'])->name('notifications.markAsRead');

Route::middleware('auth')->group(function () {
    Route::resource('hostel-registration', HostelRegistrationController::class)->only(['create', 'store']);
});


Route::get('/view-file/{filename}', 'FileController@viewFile')->name('view.file');
