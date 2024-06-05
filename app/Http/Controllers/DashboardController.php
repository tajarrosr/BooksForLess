<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCustomers = User::count();
        return view('admin.dashboard', compact('totalBooks', 'totalCustomers'));
    }
}
