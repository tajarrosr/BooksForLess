@extends('admin.layouts.app')

@section('content')
<h2>Add New Book</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.inventory.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="book_title">Title</label>
        <input type="text" name="book_title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_author">Author</label>
        <input type="text" name="book_author" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_genres">Genre</label>
        <input type="text" name="book_genres" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_desc">Description</label>
        <textarea name="book_desc" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="book_price">Price</label>
        <input type="number" name="book_price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_stock">Stock</label>
        <input type="number" name="book_stock" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_isbn">ISBN</label>
        <input type="text" name="book_isbn" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="book_tmb">Picture</label>
        <input type="file" name="book_tmb" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection
