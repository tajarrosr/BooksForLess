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
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" name="genre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="quantity">Stock</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" name="picture" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Book</button>
</form>
@endsection
