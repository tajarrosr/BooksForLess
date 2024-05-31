<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    // * customer front-end
    public function index()
    {
        $books = array("books" => DB::table('books')->orderBy('created_at', 'desc')->paginate(30));
        return view('public.browse_books', $books);
    }

    // * admin front-end
    public function indexAdmin()
    {
        $books = array('books' => DB::table('books')->orderBy('created_at', 'desc')->paginate());
        return view('admin.inventory.index', $books);
    }
    

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.inventory.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'book_genre' => 'required',
            'book_desc' => 'required',
            'book_price' => 'required|numeric',
            'book_stock' => 'required|integer',
            'book_tmb' => 'required|image', 
        ]);

        $path = $request->file('book_tmb')->store('pictures', 'public');

        Book::create([
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_genre' => $request->book_genre,
            'book_desc' => $request->book_desc,
            'book_price' => $request->book_price,
            'book_stock' => $request->book_stock,
            'book_tmb' => $path,
        ]);

        return redirect()->route('admin.inventory.index')->with('success', 'Book created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Book $book)
    {
        return view('admin.inventory.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'book_genre' => 'required',
            'book_desc' => 'required',
            'book_price' => 'required|numeric',
            'book_stock' => 'required|integer',
            'book_tmb' => 'nullable|image',
        ]);

        if ($request->hasFile('book_tmb')) {
            Storage::disk('public')->delete($book->book_tmb);
            $path = $request->file('book_tmb')->store('pictures', 'public');
            $book->book_tmb = $path;
        }

        $book->update([
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_genre' => $request->book_genre,
            'book_desc' => $request->book_desc,
            'book_price' => $request->book_price,
            'book_stock' => $request->book_stock,
        ]);

        return redirect()->route('admin.inventory.index')->with('success', 'Book updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->book_tmb);
        $book->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Book deleted successfully.');
    }
}
