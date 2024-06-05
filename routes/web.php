<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Redirect root to landing page
Route::redirect('/', '/');

Route::get('/', function () {
    return view('public.landing');
 })->name('landing');

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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    
    
    // Inventory Routes
    Route::get('/admin/inventory', [BooksController::class, 'indexAdmin'])->name('admin.inventory.index');
    Route::get('/admin/inventory/create', [BooksController::class, 'create'])->name('admin.inventory.create');
    Route::post('/admin/inventory', [BooksController::class, 'store'])->name('admin.inventory.store');
    Route::get('/admin/inventory/{book}/edit', [BooksController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/admin/inventory/{book}', [BooksController::class, 'update'])->name('admin.inventory.update');
    Route::delete('/admin/inventory/{book}', [BooksController::class, 'destroy'])->name('admin.inventory.destroy');

    Route::get('/admin/customers', [UserController::class, 'index'])->name('admin.customers.index');
    Route::get('/admin/customers/{user}/edit', [UserController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/admin/customers/{user}', [UserController::class, 'update'])->name('admin.customers.update');
    Route::delete('/admin/customers/{user}', [UserController::class, 'destroy'])->name('admin.customers.destroy');

     // Admin Logout
     Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Route for Checkout Page
Route::get('/checkout', [CheckoutController::class, 'checkoutPage'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order-confirmed', [CheckoutController::class, 'success'])->name('checkout.order_confirmed');


// CUSTOMERS OR USERS ROUTES
// Route for User Registration
Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [UserController::class, 'register']);

// Route for User Login
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
