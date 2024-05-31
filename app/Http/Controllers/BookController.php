<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // the retrieval of book controller for books is here
    public function index()
    {
        $books = array("books" => DB::table('books')->orderBy('created_at', 'desc')->paginate());
        return view('public.browse_books', $books);
    }

    // Display a listing of the resource.
    public function indexAdmin()
    {
        $books = Book::all();
        return view('admin.inventory.index', compact('books'));
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
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'required|image',
        ]);

        $path = $request->file('picture')->store('pictures', 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'picture' => $path,
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
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'nullable|image',
        ]);

        if ($request->hasFile('picture')) {
            Storage::disk('public')->delete($book->picture);
            $path = $request->file('picture')->store('pictures', 'public');
            $book->picture = $path;
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.inventory.index')->with('success', 'Book updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->picture);
        $book->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Book deleted successfully.');
    }
    
}
