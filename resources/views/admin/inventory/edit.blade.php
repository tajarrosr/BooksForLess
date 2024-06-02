@extends('admin.layouts.app')

@section('content')
<h2>Edit Book</h2>
<form action="{{ route('admin.inventory.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="book_title">Title</label>
        <input type="text" name="book_title" class="form-control" value="{{ $book->book_title }}" required>
    </div>
    <div class="form-group">
        <label for="book_author">Author</label>
        <input type="text" name="book_author" class="form-control" value="{{ $book->book_author }}" required>
    </div>
    <div class="form-group">
        <label for="book_genre">Genre</label>
        <input type="text" name="book_genre" class="form-control" value="{{ $book->book_genres }}" required>
    </div>
    <div class="form-group">
        <label for="book_desc">Description</label>
        <textarea name="book_desc" class="form-control" required>{{ $book->book_desc }}</textarea>
    </div>
    <div class="form-group">
        <label for="book_price">Price</label>
        <input type="number" name="book_price" class="form-control" value="{{ $book->book_price }}" required>
    </div>
    <div class="form-group">
        <label for="book_stock">Quantity</label>
        <input type="number" name="book_stock" class="form-control" value="{{ $book->book_stock }}" required>
    </div>
    <div class="form-group">
        <label for="book_tmb">Picture</label>
        <input type="file" name="book_tmb" class="form-control">
        @if($book->book_tmb)
            <img src="{{ asset('storage/' . $book->book_tmb) }}" alt="{{ $book->book_title }}" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection
