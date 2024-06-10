<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController; // Tambahkan ini

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
    return view('home');
})->middleware('auth');

Route::get('/consultation', function () {
    return view('consul');
})->name('consul')->middleware('auth');

Route::get('/booking', function () {
    return view('booking');
})->name('Book')->middleware('auth');

Route::get('/userprofile', function () {
    return view('user');
})->name('UP')->middleware('auth');

Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'send'])->name('send.email');

Route::middleware(['auth'])->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::get('/profile', function () {
        return view('user_profile');
    })->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Tambahkan rute untuk menyimpan booking di sini
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

// Auth Routes
Route::middleware(['guest'])->group(function () {
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('admin.logout')->middleware('auth:admin');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);
});
