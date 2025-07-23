@extends('layouts.admin')

@section('title', 'Edit Book - BooksForLess')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-edit me-2"></i>Edit Book</h1>
    <a href="{{ route('admin.inventory.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Inventory
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.inventory.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="book_title" class="form-label">Book Title</label>
                        <input type="text" class="form-control @error('book_title') is-invalid @enderror" 
                               id="book_title" name="book_title" value="{{ old('book_title', $book->book_title) }}" required>
                        @error('book_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_author" class="form-label">Author</label>
                        <input type="text" class="form-control @error('book_author') is-invalid @enderror" 
                               id="book_author" name="book_author" value="{{ old('book_author', $book->book_author) }}" required>
                        @error('book_author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_desc" class="form-label">Description</label>
                        <textarea class="form-control @error('book_desc') is-invalid @enderror" 
                                  id="book_desc" name="book_desc" rows="4" required>{{ old('book_desc', $book->book_desc) }}</textarea>
                        @error('book_desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_genre" class="form-label">Genres</label>
                        <select class="form-select @error('book_genre') is-invalid @enderror" 
                                id="book_genre" name="book_genre[]" multiple required>
                            @foreach(config('book_genres') as $genre)
                                <option value="{{ $genre }}" 
                                        {{ in_array($genre, old('book_genre', json_decode($book->book_genres, true))) ? 'selected' : '' }}>
                                    {{ $genre }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Hold Ctrl/Cmd to select multiple genres</div>
                        @error('book_genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="book_tmb" class="form-label">Book Cover</label>
                        <input type="file" class="form-control @error('book_tmb') is-invalid @enderror" 
                               id="book_tmb" name="book_tmb" accept="image/*">
                        @error('book_tmb')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <img id="imagePreview" 
                                 src="{{ asset('storage/' . $book->book_tmb) }}" 
                                 alt="Current Cover" 
                                 style="max-width: 100%; height: 200px; object-fit: cover;" 
                                 class="img-thumbnail"
                                 onerror="this.src='https://via.placeholder.com/200x300/f8f9fa/6c757d?text=No+Image'">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_price" class="form-label">Price (₱)</label>
                        <input type="number" class="form-control @error('book_price') is-invalid @enderror" 
                               id="book_price" name="book_price" value="{{ old('book_price', $book->book_price) }}" 
                               step="0.01" min="0" required>
                        @error('book_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_stock" class="form-label">Stock Quantity</label>
                        <input type="number" class="form-control @error('book_stock') is-invalid @enderror" 
                               id="book_stock" name="book_stock" value="{{ old('book_stock', $book->book_stock) }}" 
                               min="0" required>
                        @error('book_stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="book_isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control @error('book_isbn') is-invalid @enderror" 
                               id="book_isbn" name="book_isbn" value="{{ old('book_isbn', $book->book_isbn) }}" required>
                        @error('book_isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Book
                    </button>
                    <a href="{{ route('admin.inventory.index') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview for new uploads
    document.getElementById('book_tmb').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
