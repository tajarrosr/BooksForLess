@extends('layouts.app')

@section('title', 'Browse Books - BooksForLess')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="lg:w-1/4">
            <div class="card bg-base-100 shadow-xl sticky top-24">
                <div class="card-header bg-primary text-primary-content p-4 rounded-t-2xl">
                    <h3 class="card-title">
                        <i class="fas fa-filter"></i>
                        Filters
                    </h3>
                </div>
                <div class="card-body p-6 space-y-6">
                    <!-- Search -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Search</span>
                        </label>
                        <input type="text" id="searchInput" placeholder="Search books..." 
                               class="input input-bordered w-full" />
                    </div>
                    
                    <!-- Price Range -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Price Range</span>
                        </label>
                        <select id="priceFilter" class="select select-bordered w-full">
                            <option value="">All Prices</option>
                            <option value="0-500">₱0 - ₱500</option>
                            <option value="500-1000">₱500 - ₱1,000</option>
                            <option value="1000-2000">₱1,000 - ₱2,000</option>
                            <option value="2000+">₱2,000+</option>
                        </select>
                    </div>
                    
                    <!-- Genre Filter -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Genre</span>
                        </label>
                        <select id="genreFilter" class="select select-bordered w-full">
                            <option value="">All Genres</option>
                            @foreach(config('book_genres') as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Sort By -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Sort By</span>
                        </label>
                        <select id="sortFilter" class="select select-bordered w-full">
                            <option value="newest">Newest First</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="title">Title A-Z</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-outline w-full" onclick="clearFilters()">
                        <i class="fas fa-times"></i>
                        Clear Filters
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Books Grid -->
        <div class="lg:w-3/4">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <h1 class="text-3xl font-bold text-gradient">
                    <i class="fas fa-book"></i>
                    All Books
                </h1>
                <div class="flex items-center gap-4">
                    <span class="text-base-content/70" id="bookCount">{{ count($books) }} books found</span>
                    <div class="join">
                        <button class="join-item btn btn-sm btn-active" onclick="setView('grid')">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="join-item btn btn-sm" onclick="setView('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div id="booksContainer" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($books as $book)
                <div class="book-item book-card" 
                     data-title="{{ strtolower($book->book_title) }}"
                     data-author="{{ strtolower($book->book_author) }}"
                     data-price="{{ $book->book_price }}"
                     data-genres="{{ strtolower(implode(',', $book->book_genres)) }}">
                    <div class="card bg-base-100 shadow-xl h-full">
                        <figure class="relative">
                            <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                                 alt="{{ $book->book_title }}"
                                 class="w-full h-64 object-cover"
                                 onerror="this.src='https://via.placeholder.com/300x400/f8f9fa/6c757d?text=No+Image'" />
                            @if($book->book_stock <= 5 && $book->book_stock > 0)
                                <div class="badge badge-warning absolute top-2 right-2">Low Stock</div>
                            @elseif($book->book_stock <= 0)
                                <div class="badge badge-error absolute top-2 right-2">Out of Stock</div>
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <h3 class="card-title text-lg line-clamp-2">{{ $book->book_title }}</h3>
                            <p class="text-base-content/70 text-sm mb-2">by {{ $book->book_author }}</p>
                            
                            <div class="flex flex-wrap gap-1 mb-3">
                                @foreach(array_slice($book->book_genres, 0, 2) as $genre)
                                    <div class="badge badge-outline badge-sm">{{ $genre }}</div>
                                @endforeach
                            </div>
                            
                            <p class="text-sm text-base-content/70 line-clamp-3 flex-grow">
                                {{ $book->book_desc }}
                            </p>
                            
                            <div class="card-actions justify-between items-center mt-4">
                                <div>
                                    <div class="text-2xl font-bold text-primary">₱{{ number_format($book->book_price, 2) }}</div>
                                    <div class="text-xs text-base-content/70">Stock: {{ $book->book_stock }}</div>
                                </div>
                                <button class="btn btn-primary btn-sm" 
                                        onclick="addToCart({{ $book->id }}, '{{ addslashes($book->book_title) }}', {{ $book->book_price }}, '{{ asset('storage/' . $book->book_tmb) }}')"
                                        {{ $book->book_stock <= 0 ? 'disabled' : '' }}>
                                    <i class="fas fa-cart-plus"></i>
                                    {{ $book->book_stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fas fa-book text-6xl text-base-content/20 mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">No books found</h3>
                    <p class="text-base-content/70">Try adjusting your filters or search terms.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let allBooks = document.querySelectorAll('.book-item');
    
    function filterBooks() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const priceRange = document.getElementById('priceFilter').value;
        const genre = document.getElementById('genreFilter').value.toLowerCase();
        const sortBy = document.getElementById('sortFilter').value;
        
        let visibleBooks = Array.from(allBooks).filter(book => {
            const title = book.dataset.title;
            const author = book.dataset.author;
            const searchMatch = !searchTerm || title.includes(searchTerm) || author.includes(searchTerm);
            
            const price = parseFloat(book.dataset.price);
            let priceMatch = true;
            if (priceRange) {
                if (priceRange === '0-500') priceMatch = price <= 500;
                else if (priceRange === '500-1000') priceMatch = price > 500 && price <= 1000;
                else if (priceRange === '1000-2000') priceMatch = price > 1000 && price <= 2000;
                else if (priceRange === '2000+') priceMatch = price > 2000;
            }
            
            const genres = book.dataset.genres;
            const genreMatch = !genre || genres.includes(genre);
            
            return searchMatch && priceMatch && genreMatch;
        });
        
        visibleBooks.sort((a, b) => {
            switch(sortBy) {
                case 'price-low':
                    return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                case 'price-high':
                    return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                case 'title':
                    return a.dataset.title.localeCompare(b.dataset.title);
                default:
                    return 0;
            }
        });
        
        allBooks.forEach(book => book.style.display = 'none');
        visibleBooks.forEach(book => book.style.display = 'block');
        
        document.getElementById('bookCount').textContent = `${visibleBooks.length} books found`;
    }
    
    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('priceFilter').value = '';
        document.getElementById('genreFilter').value = '';
        document.getElementById('sortFilter').value = 'newest';
        filterBooks();
    }
    
    function setView(view) {
        const container = document.getElementById('booksContainer');
        const buttons = document.querySelectorAll('.join-item');
        
        buttons.forEach(btn => btn.classList.remove('btn-active'));
        event.target.classList.add('btn-active');
        
        if (view === 'list') {
            container.className = 'space-y-4';
            allBooks.forEach(book => {
                book.className = 'book-item book-card';
                const card = book.querySelector('.card');
                card.classList.add('card-side');
                const figure = card.querySelector('figure');
                figure.className = 'relative w-32 flex-shrink-0';
                const img = figure.querySelector('img');
                img.className = 'w-full h-full object-cover';
            });
        } else {
            container.className = 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6';
            allBooks.forEach(book => {
                book.className = 'book-item book-card';
                const card = book.querySelector('.card');
                card.classList.remove('card-side');
                const figure = card.querySelector('figure');
                figure.className = 'relative';
                const img = figure.querySelector('img');
                img.className = 'w-full h-64 object-cover';
            });
        }
    }
    
    document.getElementById('searchInput').addEventListener('input', filterBooks);
    document.getElementById('priceFilter').addEventListener('change', filterBooks);
    document.getElementById('genreFilter').addEventListener('change', filterBooks);
    document.getElementById('sortFilter').addEventListener('change', filterBooks);
</script>
@endpush
