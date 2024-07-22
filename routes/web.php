<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');

Route::post('/loginauth', [AuthManager::class, 'loginPost'])->name('login.post');
Route::post('/registerauth', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function() {
        return view('welcome');
    })->name('home');
    
    Route::post('/pay', [PaymentController::class, 'initiatePayment'])->name('pay');
    Route::post('/payment-callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
});
