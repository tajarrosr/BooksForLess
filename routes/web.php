<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Redirect root to browse-books
Route::redirect('/', '/browse-books');

// Route For Browse Products
Route::get('/browse-books', [BookController::class, 'index'])->name('show-all.books');

// Route for Admin Registration
Route::get('admin/registration', [AdminController::class, 'showRegistrationForm']);
Route::post('admin/registration', [AdminController::class, 'register'])->name('admin.register');

// Route for Admin Login
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login'); 
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// Route for Admin Dashboard
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Inventory Routes
    Route::get('/admin/inventory', [BookController::class, 'index'])->name('admin.inventory.index');
    Route::get('/admin/inventory/create', [BookController::class, 'create'])->name('admin.inventory.create');
    Route::post('/admin/inventory', [BookController::class, 'store'])->name('admin.inventory.store');
    Route::get('/admin/inventory/{book:title}/edit', [BookController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/admin/inventory/{book:title}', [BookController::class, 'update'])->name('admin.inventory.update');
    Route::delete('/admin/inventory/{book:title}', [BookController::class, 'destroy'])->name('admin.inventory.destroy');
});
