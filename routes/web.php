<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/browse-books');

// Route For Browse Products
Route::get('/browse-books', [BookController::class, 'index'])->name('show-all.books');


// Route for Admin Registration
Route::get('admin/registration', [AdminController::class, 'showRegistrationForm']);
Route::post('admin/registration', [AdminController::class, 'register'])->name('admin.register');


// Route for Admin Login
Route::get('admin/login', [AdminController::class, 'showLoginForm']);
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');


// Route for Admin Dashboard
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});