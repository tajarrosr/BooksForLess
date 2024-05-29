<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // the retrieval of book controller for books is here
    public function index()
    {
        return view('public.landing');
    }
}
