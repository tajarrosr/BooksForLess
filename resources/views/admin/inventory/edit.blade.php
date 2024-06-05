@extends('admin.layouts.app')

@section('content')
<title>Edit - Books Inventory</title>
<h2 class="custom-label mb-8 text-3xl font-bold text-center dark:text-white">Edit a Book Information</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.inventory.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="custom-bg space-y-6 p-6 rounded-lg shadow-md">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="form-group">
            <label for="book_title" class="custom-label block">Title</label>
            <input type="text" name="book_title" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" value="{{ $book->book_title }}" required>
        </div>
        <div class="form-group">
            <label for="book_author" class="custom-label block">Author</label>
            <input type="text" name="book_author" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" value="{{ $book->book_author }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="book_genre" class="custom-label block">Genre</label>
        <select name="book_genre[]" id="book_genre" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" multiple="multiple" required>
            @foreach(config('book_genres') as $genre)
                <option value="{{ $genre }}" {{ in_array($genre, json_decode($book->book_genres, true)) ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="book_desc" class="custom-label block">Description</label>
        <textarea name="book_desc" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>{{ $book->book_desc }}</textarea>
    </div>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="form-group">
            <label for="book_price" class="custom-label block">Price</label>
            <input type="number" name="book_price" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" value="{{ $book->book_price }}" required>
        </div>
        <div class="form-group">
            <label for="book_stock" class="custom-label block">Stock</label>
            <input type="number" name="book_stock" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" value="{{ $book->book_stock }}" required>
        </div>
        <div class="form-group">
            <label for="book_isbn" class="custom-label block">ISBN</label>
            <input type="text" name="book_isbn" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white" value="{{ $book->book_isbn }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="book_tmb" class="custom-label block">Picture</label>
        <input type="file" name="book_tmb" class="form-control custom-input w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-white">
        @if($book->book_tmb)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $book->book_tmb) }}" alt="{{ $book->book_title }}" class="w-32 h-40 object-cover rounded-md shadow-md">
            </div>
        @endif
    </div>
    <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Update Book</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#book_genre').select2({
            placeholder: 'Please Select a Genre / Genres'
        });
    });
</script>
@endsection
