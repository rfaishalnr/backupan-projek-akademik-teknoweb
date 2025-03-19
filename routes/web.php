<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

// Menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route Login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Reset Password or Email
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Dashboard berdasarkan role
Route::get('/dashboard/dashboard-mahasiswa', function () {
    return view('dashboard.dashboard-mahasiswa');
})->middleware(['auth'])->name('dashboard.mahasiswa');

Route::get('/dashboard/dashboard-dosen', function () {
    return view('dashboard.dashboard-dosen');
})->middleware(['auth'])->name('dashboard.dosen');

Route::get('/dashboard/dashboard-admin', function () {
    return view('dashboard.dashboard-admin');
})->middleware(['auth'])->name('dashboard.admin');

// Route Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');