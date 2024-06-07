<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/consultation', function () {
    return view('consul');
})->name('consul');

Route::get('/booking', function () {
    return view('booking');
})->name('Book');

Route::post('/send-email', [App\Http\Controllers\EmailController::class, 'send'])->name('send.email');
