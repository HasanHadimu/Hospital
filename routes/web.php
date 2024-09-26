<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'redirect']);

//route ke halaman add doctor
Route::get('/add_doctor', [AdminController::class, 'add_doctor']);


//route ke halaman post upload doctor
Route::post('/upload_doctor', [AdminController::class, 'upload_doctor']);

//route ke halaman post upload appointment
Route::post('/appointment', [HomeController::class, 'appointment']);

//route ke halaman pages - appointment
Route::get('/myappointment', [HomeController::class, 'myappointment']);

//route ke halaman pages - cancel
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

//route ke halaman admin - Appointments
Route::get('/showappointment', [AdminController::class, 'showappointment']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
