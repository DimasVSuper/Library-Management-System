<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'post'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'post'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Book Management Routes
    Route::resource('books', BookController::class);
    
    // Member Management Routes
    Route::resource('members', MemberController::class);
    
    // Borrowing Management Routes
    Route::resource('borrowings', BorrowingController::class);
    Route::put('borrowings/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');
});
