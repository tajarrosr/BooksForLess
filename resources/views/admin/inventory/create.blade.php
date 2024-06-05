@extends('admin.layouts.app')

@section('content')
<h2 class="custom-label mb-8 text-3xl font-bold text-center dark:text-white">Insert a Book Information</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.inventory.store') }}" method="POST" enctype="multipart/form-data" class="custom-bg shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="form-group mb-4">
        <label for="book_title" class="custom-label block text-gray-700 dark:text-white">Title</label>
        <input type="text" name="book_title" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <div class="form-group mb-4">
        <label for="book_author" class="custom-label block text-gray-700 dark:text-white">Author</label>
        <input type="text" name="book_author" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <div class="form-group mb-4">
        <label for="book_genre" class="custom-label block text-gray-700 dark:text-white">Genre</label>
        <select name="book_genre[]" id="book_genre" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" multiple="multiple" required>
            @foreach(config('book_genres') as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-4">
        <label for="book_desc" class="custom-label block text-gray-700 dark:text-white">Description</label>
        <textarea name="book_desc" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required></textarea>
    </div>
    <div class="form-group mb-4">
        <label for="book_price" class="custom-label block text-gray-700 dark:text-white">Price</label>
        <input type="number" name="book_price" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <div class="form-group mb-4">
        <label for="book_stock" class="custom-label block text-gray-700 dark:text-white">Stock</label>
        <input type="number" name="book_stock" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <div class="form-group mb-4">
        <label for="book_isbn" class="custom-label block text-gray-700 dark:text-white">ISBN</label>
        <input type="text" name="book_isbn" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <div class="form-group mb-4">
        <label for="book_tmb" class="custom-label block text-gray-700 dark:text-white">Picture</label>
        <input type="file" name="book_tmb" class="form-control custom-input w-full p-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white" required>
    </div>
    <button type="submit" class="btn btn-primary bg-blue-500 text-white p-2 rounded hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">Add Book</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#book_genre').select2({
            placeholder: 'Please Select a Genre / Genres'
        });
    });
</script>
@endsection
