<?php

use App\Modules\UserManagement\Controllers\UserManagementController;
use App\Modules\UserManagement\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

// Route untuk login
Route::get('/login', function () {
    return view('UserManagement.views.auth.login');
})->name('login');

// Route untuk register
Route::get('/register', function () {
    return view('UserManagement.views.auth.register');
})->name('register');

// Route untuk menampilkan form reset password
Route::get('/reset-password/{token}', function ($token) {
    return view('UserManagement.views.auth.reset-password', ['token' => $token]);
})->name('password.reset');

// Route untuk memproses form reset password
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Route untuk forgot password
Route::get('/forgot-password', function () {
    return view('UserManagement.views.auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route lainnya
Route::group(['prefix' => 'user_management'], function () {
    Route::get('/', [UserManagementController::class, 'render']);
});