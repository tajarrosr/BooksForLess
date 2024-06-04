@extends('admin.layouts.app')

@section('title', 'Inventory Management')

@section('content')
<div class="container mt-2"> <!-- Adjusted margin-top for container -->
    <h2 class="mb-4 text-center">Books Inventory Management</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary">Add New Book</a>
    </div>
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered table-striped mb-0">
                <thead class="table-dark">
                <tr>
                        <th class="py-2 px-4 text-center">Image</th>
                        <th class="py-2 px-4 text-center">Title</th>
                        <th class="py-2 px-4 text-center">Author</th>
                        <th class="py-2 px-4 text-center">Genre</th>
                        <th class="py-2 px-4 text-center">Description</th>
                        <th class="py-2 px-4 text-center">Price</th>
                        <th class="py-2 px-4 text-center">Stock</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                        <td class="py-2 px-4 text-center">
                                <a href="{{ asset('storage/' . $book->book_tmb) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $book->book_tmb) }}" alt="{{ $book->book_title }}" class="img-fluid w-20 h-auto">
                                </a>
                            </td>
                            <td class="py-2 px-4 text-center">{{ $book->book_title }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_author }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_genres }}</td>
                            <td class="py-2 px-4 text-center">{{ Str::limit($book->book_desc, 50) }}</td>
                            <td class="py-2 px-4 text-right">₱{{ number_format($book->book_price, 2) }}</td>
                            <td class="py-2 px-4 text-center">{{ $book->book_stock }}</td>
                            <td class="align-middle text-center">
                            <a href="{{ route('admin.inventory.edit', $book->id) }}" class="btn btn-warning btn-sm bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.inventory.destroy', $book->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
<button id="scrollToTopBtn" class="btn btn-primary">
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
                scrollToTopBtn.style.display = 'block';
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
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 100;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    #scrollToTopBtn:hover {
        background-color: #0056b3;
    }
</style>
@endsection
