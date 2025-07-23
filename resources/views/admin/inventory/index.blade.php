@extends('layouts.admin')

@section('title', 'Inventory Management - BooksForLess')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-boxes me-2"></i>Inventory Management</h1>
    <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Book
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">Books Inventory</h5>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchBooks" placeholder="Search books...">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Genres</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                                 alt="{{ $book->book_title }}" 
                                 class="img-thumbnail" 
                                 style="width: 50px; height: 60px; object-fit: cover;"
                                 onerror="this.src='https://via.placeholder.com/50x60/f8f9fa/6c757d?text=No+Image'">
                        </td>
                        <td>
                            <strong>{{ Str::limit($book->book_title, 30) }}</strong><br>
                            <small class="text-muted">ISBN: {{ $book->book_isbn }}</small>
                        </td>
                        <td>{{ $book->book_author }}</td>
                        <td>₱{{ number_format($book->book_price, 2) }}</td>
                        <td>
                            @if($book->book_stock <= 5)
                                <span class="badge bg-warning">{{ $book->book_stock }}</span>
                            @elseif($book->book_stock <= 0)
                                <span class="badge bg-danger">Out of Stock</span>
                            @else
                                <span class="badge bg-success">{{ $book->book_stock }}</span>
                            @endif
                        </td>
                        <td>
                            @foreach(array_slice(json_decode($book->book_genres, true), 0, 2) as $genre)
                                <span class="badge bg-light text-dark me-1">{{ $genre }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.inventory.edit', $book->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.inventory.destroy', $book->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this book?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-book fa-3x text-muted mb-3"></i>
                            <h5>No books found</h5>
                            <p class="text-muted">Start by adding your first book to the inventory.</p>
                            <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add New Book
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($books->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple search functionality
    document.getElementById('searchBooks').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
@endpush
