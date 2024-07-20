<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::post('/registerauth', [AuthController::class, 'register'])->name('register.submit');
