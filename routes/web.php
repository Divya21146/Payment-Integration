<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');

Route::post('/loginauth', [AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/registerauth', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
