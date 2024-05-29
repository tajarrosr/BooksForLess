<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // the retrieval of book controller for books is here
    public function index()
    {
        $data = array("books" => DB::table('books')->orderBy('created_at', 'desc')->paginate());

        return view('public.browse_books', $data);
    }
}
