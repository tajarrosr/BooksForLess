@extends('layouts.app')

@section('title', 'Discover Books - BooksForLess')

@section('content')
<div class="container mx-auto px-4 py-8 sm:py-12">
    <!-- Page Header - Replaced with Image -->
    <div class="mb-8 sm:mb-12">
        <img src="{{ asset('assets/images/browse_books/banner.jpg') }}" 
             alt="Discover Amazing Books" 
             class="w-full h-64 object-fit rounded-lg shadow-lg" />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Filters Sidebar -->
        <div class="lg:col-span-1">
            <div class="collapse collapse-arrow bg-base-100 shadow-xl sticky top-20">
                <input type="checkbox" id="filter-toggle" class="peer" checked /> 
                <div class="collapse-title text-xl font-bold text-neutral flex items-center cursor-pointer">
                    <i class="fas fa-sliders-h text-primary mr-3"></i>
                    Filters
                </div>
                <div class="collapse-content">
                    <div class="p-6 space-y-6">
                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-semibold text-neutral mb-2">Price Range</label>
                            <select id="priceFilter" class="select select-bordered w-full text-sm bg-base-200 text-neutral">
                                <option value="">All Prices</option>
                                <option value="0-500">₱0 - ₱500</option>
                                <option value="500-1000">₱500 - ₱1,000</option>
                                <option value="1000-2000">₱1,000 - ₱2,000</option>
                                <option value="2000+">₱2,000+</option>
                            </select>
                        </div>
                        
                        <!-- Genre Filter -->
                        <div>
                            <label class="block text-sm font-semibold text-neutral mb-2">Genre</label>
                            <select id="genreFilter" class="select select-bordered w-full text-sm bg-base-200 text-neutral">
                                <option value="">All Genres</option>
                                @foreach(config('book_genres') as $genre)
                                    <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Sort By -->
                        <div>
                            <label class="block text-sm font-semibold text-neutral mb-2">Sort By</label>
                            <select id="sortFilter" class="select select-bordered w-full text-sm bg-base-200 text-neutral">
                                <option value="newest">Newest First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="title">Title A-Z</option>
                            </select>
                        </div>
                        
                        <button class="btn btn-outline btn-primary w-full" onclick="clearFilters()">
                            <i class="fas fa-refresh mr-2"></i>
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Books Grid -->
        <div class="lg:col-span-3">
            <!-- Controls -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <span class="text-secondary font-semibold" id="bookCount">{{ count($books) }} books found</span>
            </div>
            
            <!-- Books Container -->
            <div id="booksContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($books as $book)
                <a href="{{ route('show.book.details', $book->id) }}" 
                   class="book-item group block" 
                   data-title="{{ strtolower($book->book_title) }}"
                   data-author="{{ strtolower($book->book_author) }}"
                   data-price="{{ $book->book_price }}"
                   data-genres="{{ strtolower(implode(',', $book->book_genres)) }}">
                    <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
                        <figure class="relative h-64 overflow-hidden rounded-t-lg">
                            <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                                 alt="{{ $book->book_title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                 onerror="this.src='https://via.placeholder.com/300x400/F8FAFC/94A3B8?text=No+Image'" />
                            
                            <!-- Status Badge -->
                            @if($book->book_stock <= 5 && $book->book_stock > 0)
                                <div class="badge badge-warning absolute top-3 right-3 text-xs font-bold">
                                    Low Stock
                                </div>
                            @elseif($book->book_stock <= 0)
                                <div class="badge badge-error absolute top-3 right-3 text-xs font-bold">
                                    Sold Out
                                </div>
                            @endif
                        </figure>
                        
                        <div class="card-body p-4 flex-grow flex flex-col justify-between">
                            <div>
                                <!-- Genres -->
                                <div class="flex flex-wrap gap-1.5 mb-2">
                                    @foreach(array_slice($book->book_genres, 0, 2) as $genre)
                                        <span class="badge badge-outline badge-primary text-xs">{{ $genre }}</span>
                                    @endforeach
                                </div>
                                
                                <!-- Title & Author -->
                                <h2 class="card-title text-lg font-bold text-neutral line-clamp-2 mb-1">
                                    {{ $book->book_title }}
                                </h2>
                                <p class="text-sm text-secondary mb-3">by {{ $book->book_author }}</p>
                            </div>
                            
                            <!-- Price & Stock -->
                            <div class="flex justify-between items-center border-t border-base-200 pt-3 mt-auto">
                                <div class="text-xl font-bold text-primary">₱{{ number_format($book->book_price, 2) }}</div>
                                <div class="text-xs text-secondary">{{ $book->book_stock }} in stock</div>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-16">
                    <div class="w-28 h-28 bg-base-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-book text-4xl text-secondary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral mb-3">No books found</h3>
                    <p class="text-secondary mb-6">Try adjusting your filters to discover more books.</p>
                    <button class="btn btn-primary" onclick="clearFilters()">
                        <i class="fas fa-refresh mr-2"></i>
                        Reset Filters
                    </button>
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
        const priceRange = document.getElementById('priceFilter').value;
        const genre = document.getElementById('genreFilter').value.toLowerCase();
        const sortBy = document.getElementById('sortFilter').value;
        
        let visibleBooks = Array.from(allBooks).filter(book => {
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
            
            return priceMatch && genreMatch;
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
        document.getElementById('priceFilter').value = '';
        document.getElementById('genreFilter').value = '';
        document.getElementById('sortFilter').value = 'newest';
        filterBooks();
    }
    
    // Event listeners
    document.getElementById('priceFilter').addEventListener('change', filterBooks);
    document.getElementById('genreFilter').addEventListener('change', filterBooks);
    document.getElementById('sortFilter').addEventListener('change', filterBooks);
</script>
@endpush
