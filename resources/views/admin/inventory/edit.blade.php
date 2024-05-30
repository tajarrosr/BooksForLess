@extends('admin.layouts.app')

@section('content')
<h2>Edit Book</h2>
<form action="{{ route('admin.inventory.update', $book->title) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
    </div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" name="genre" class="form-control" value="{{ $book->genre }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ $book->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" value="{{ $book->price }}" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ $book->quantity }}" required>
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" name="picture" class="form-control">
        @if($book->picture)
            <img src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->title }}" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection
