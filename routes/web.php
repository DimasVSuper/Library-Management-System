<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('main');
    });
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'post'])->name('login.post');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'post'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('Dashboard');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
