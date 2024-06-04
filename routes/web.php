<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Redirect root to browse-books
Route::redirect('/', '/browse-books');

// Route For Browse Products
Route::get('/browse-books', [BooksController::class, 'index'])->name('show-all.books');

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
    Route::get('/admin/inventory', [BooksController::class, 'indexAdmin'])->name('admin.inventory.index');
    Route::get('/admin/inventory/create', [BooksController::class, 'create'])->name('admin.inventory.create');
    Route::post('/admin/inventory', [BooksController::class, 'store'])->name('admin.inventory.store');
    Route::get('/admin/inventory/{book}/edit', [BooksController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/admin/inventory/{book}', [BooksController::class, 'update'])->name('admin.inventory.update');
    Route::delete('/admin/inventory/{book}', [BooksController::class, 'destroy'])->name('admin.inventory.destroy');
});

// Route for Checkout Page
Route::get('/checkout', [CheckoutController::class, 'checkoutPage']);
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order-confirmed', [CheckoutController::class, 'success'])->name('checkout.order_confirmed');


// CUSTOMERS OR USERS ROUTES
// Route for User Registration
Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);

// Route for User Login
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
