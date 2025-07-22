@extends('admin.layouts.app')

@section('title', 'Inventory Management')

@section('content')
<title>Admin - Books Inventory</title>
<div class="container mt-8"> 
    <h2 class="mb-4 text-3xl font-bold text-center dark:text-white">Books Inventory Management</h2>
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600">Add New Book</a>
    </div>
    <div class="card shadow-lg">
        <div class="card-body p-0">
            <table class="table-auto w-full mb-0">
                <thead class="custom-bg text-color">
                    <tr>
                        <th class="py-2 px-4 text-center">Image</th>
                        <th class="py-2 px-4 text-center">Title</th>
                        <th class="py-2 px-4 text-center">Author</th>
                        <th class="py-2 px-4 text-center">Genre</th>
                        <th class="py-2 px-4 text-center">Description</th>
                        <th class="py-2 px-4 text-center">Price</th>
                        <th class="py-2 px-4 text-center">Stock</th>
                        <th class="py-2 px-4 text-center">ISBN</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="custom-bg">
                    @foreach($books as $book)
                        @php
                            // Get the actual Book model instance to use the casting
                            $bookModel = \App\Models\Book::find($book->id);
                            $genres = [];
                            
                            if ($bookModel && is_array($bookModel->book_genres)) {
                                $genres = $bookModel->book_genres;
                            } else {
                                // Fallback for direct database query results
                                if (is_string($book->book_genres)) {
                                    $decoded = json_decode($book->book_genres, true);
                                    if (is_array($decoded)) {
                                        $genres = $decoded;
                                    } else {
                                        $genres = [$book->book_genres];
                                    }
                                }
                            }
                            
                            $genreString = is_array($genres) && !empty($genres) ? implode(', ', $genres) : 'No genres';
                        @endphp
                        <tr class="border">
                            <td class="py-2 px-4 text-center">
                                <a href="{{ asset('storage/' . $book->book_tmb) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $book->book_tmb) }}" alt="{{ $book->book_title }}" class="w-20 h-28 object-cover rounded-md shadow-md">
                                </a>
                            </td>
                            <td class="py-2 px-4 text-center">{{ $book->book_title }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_author }}</td>
                            <td class="py-2 px-4 text-center">{{ $genreString }}</td>
                            <td class="py-2 px-4 text-center">{{ Str::limit($book->book_desc, 50) }}</td>
                            <td class="py-2 px-4 text-right">₱{{ number_format($book->book_price, 2) }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_stock }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_isbn }}</td>
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('admin.inventory.edit', $book->id) }}" class="btn btn-warning btn-sm bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.inventory.destroy', $book->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scroll-to-Top Button -->
<button id="scrollToTopBtn" class="btn btn-primary fixed bottom-4 right-4 z-50 bg-blue-500 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-blue-600">
    &#8679;
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this book?')) {
                    form.submit();
                }
            });
        });

        // Scroll-to-Top Button Functionality
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.style.display = 'flex';
            } else {
                scrollToTopBtn.style.display = 'none';
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>

<style>
    #scrollToTopBtn {
        display: none;
    }
</style>
@endsection
