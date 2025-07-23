@extends('layouts.app')

@section('title', 'Discover Books - BooksForLess')

@section('content')
<div class="section-modern bg-background">
    <div class="container-modern">
        <!-- Modern Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center space-x-2 bg-accent/10 rounded-full px-6 py-3 mb-6">
                <div class="w-2 h-2 bg-accent rounded-full animate-pulse-modern"></div>
                <span class="text-accent font-semibold text-sm uppercase tracking-wider">Book Collection</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-display mb-6">
                Discover <span class="text-gradient-modern">Amazing Books</span>
            </h1>
            <p class="text-xl text-subheading max-w-2xl mx-auto">
                Explore our curated collection of premium books at unbeatable prices
            </p>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- Modern Filters Sidebar -->
            <div class="xl:col-span-1">
                <div class="card-modern p-8 sticky top-32">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-10 h-10 bg-gradient-to-br from-accent to-indigo-600 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-sliders-h text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-heading">Filters</h3>
                    </div>
                    
                    <div class="space-y-8">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-bold text-heading mb-3 uppercase tracking-wider">Search</label>
                            <div class="relative">
                                <input type="text" id="searchInput" placeholder="Find your next read..." 
                                       class="input-modern pl-12" />
                                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-secondary"></i>
                            </div>
                        </div>
                        
                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-bold text-heading mb-3 uppercase tracking-wider">Price Range</label>
                            <select id="priceFilter" class="select-modern">
                                <option value="">All Prices</option>
                                <option value="0-500">₱0 - ₱500</option>
                                <option value="500-1000">₱500 - ₱1,000</option>
                                <option value="1000-2000">₱1,000 - ₱2,000</option>
                                <option value="2000+">₱2,000+</option>
                            </select>
                        </div>
                        
                        <!-- Genre Filter -->
                        <div>
                            <label class="block text-sm font-bold text-heading mb-3 uppercase tracking-wider">Genre</label>
                            <select id="genreFilter" class="select-modern">
                                <option value="">All Genres</option>
                                @foreach(config('book_genres') as $genre)
                                    <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Sort By -->
                        <div>
                            <label class="block text-sm font-bold text-heading mb-3 uppercase tracking-wider">Sort By</label>
                            <select id="sortFilter" class="select-modern">
                                <option value="newest">Newest First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="title">Title A-Z</option>
                            </select>
                        </div>
                        
                        <button class="w-full btn-outline-modern" onclick="clearFilters()">
                            <i class="fas fa-refresh mr-2"></i>
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Books Grid -->
            <div class="xl:col-span-3">
                <!-- Controls -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-12 gap-6">
                    <div class="flex items-center space-x-4">
                        <span class="text-subheading font-semibold" id="bookCount">{{ count($books) }} books found</span>
                        <div class="w-px h-6 bg-secondary/20"></div>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-secondary">View:</span>
                            <button class="w-10 h-10 bg-accent text-white rounded-xl flex items-center justify-center hover:scale-110 transition-transform" onclick="setView('grid')" id="grid-btn">
                                <i class="fas fa-th"></i>
                            </button>
                            <button class="w-10 h-10 bg-gray-100 text-secondary rounded-xl flex items-center justify-center hover:scale-110 transition-transform" onclick="setView('list')" id="list-btn">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Books Container -->
                <div id="booksContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($books as $book)
                    <div class="book-item book-card" 
                         data-title="{{ strtolower($book->book_title) }}"
                         data-author="{{ strtolower($book->book_author) }}"
                         data-price="{{ $book->book_price }}"
                         data-genres="{{ strtolower(implode(',', $book->book_genres)) }}">
                        <div class="card-modern h-full overflow-hidden group">
                            <!-- Book Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                                     alt="{{ $book->book_title }}"
                                     class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                                     onerror="this.src='https://via.placeholder.com/300x400/F8FAFC/94A3B8?text=No+Image'" />
                                
                                <!-- Status Badge -->
                                @if($book->book_stock <= 5 && $book->book_stock > 0)
                                    <div class="absolute top-4 right-4 status-warning px-3 py-1 rounded-full text-xs font-bold">
                                        Low Stock
                                    </div>
                                @elseif($book->book_stock <= 0)
                                    <div class="absolute top-4 right-4 status-error px-3 py-1 rounded-full text-xs font-bold">
                                        Sold Out
                                    </div>
                                @endif
                                
                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                <!-- Quick Actions -->
                                <div class="absolute bottom-4 left-4 right-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <button class="w-full btn-primary-modern text-sm py-3" 
                                            onclick="addToCart({{ $book->id }}, '{{ addslashes($book->book_title) }}', {{ $book->book_price }}, '{{ asset('storage/' . $book->book_tmb) }}')"
                                            {{ $book->book_stock <= 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-cart-plus mr-2"></i>
                                        {{ $book->book_stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Book Info -->
                            <div class="p-6 space-y-4">
                                <!-- Genres -->
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($book->book_genres, 0, 2) as $genre)
                                        <span class="badge-accent text-xs">{{ $genre }}</span>
                                    @endforeach
                                </div>
                                
                                <!-- Title & Author -->
                                <div>
                                    <h3 class="text-xl font-bold text-heading mb-2 line-clamp-2 group-hover:text-accent transition-colors">
                                        {{ $book->book_title }}
                                    </h3>
                                    <p class="text-subheading font-medium">by {{ $book->book_author }}</p>
                                </div>
                                
                                <!-- Description -->
                                <p class="text-sm text-muted line-clamp-3 leading-relaxed">
                                    {{ $book->book_desc }}
                                </p>
                                
                                <!-- Price & Stock -->
                                <div class="flex justify-between items-end pt-4 border-t border-gray-100">
                                    <div>
                                        <div class="text-3xl font-black text-accent">₱{{ number_format($book->book_price, 2) }}</div>
                                        <div class="text-xs text-muted">{{ $book->book_stock }} in stock</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="w-10 h-10 bg-gray-100 hover:bg-accent hover:text-white rounded-xl flex items-center justify-center transition-colors">
                                            <i class="fas fa-heart text-sm"></i>
                                        </button>
                                        <button class="w-10 h-10 bg-gray-100 hover:bg-accent hover:text-white rounded-xl flex items-center justify-center transition-colors">
                                            <i class="fas fa-share text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20">
                        <div class="w-32 h-32 bg-gradient-to-br from-accent/10 to-secondary/10 rounded-full flex items-center justify-center mx-auto mb-8">
                            <i class="fas fa-book text-5xl text-secondary/50"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-heading mb-4">No books found</h3>
                        <p class="text-subheading mb-8">Try adjusting your filters or search terms to discover more books.</p>
                        <button class="btn-primary-modern" onclick="clearFilters()">
                            <i class="fas fa-refresh mr-2"></i>
                            Reset Filters
                        </button>
                    </div>
                    @endforelse
                </div>
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
        const gridBtn = document.getElementById('grid-btn');
        const listBtn = document.getElementById('list-btn');
        
        if (view === 'list') {
            container.className = 'space-y-6';
            gridBtn.className = 'w-10 h-10 bg-gray-100 text-secondary rounded-xl flex items-center justify-center hover:scale-110 transition-transform';
            listBtn.className = 'w-10 h-10 bg-accent text-white rounded-xl flex items-center justify-center hover:scale-110 transition-transform';
            
            allBooks.forEach(book => {
                const card = book.querySelector('.card-modern');
                card.classList.add('flex', 'flex-row', 'items-center');
                const img = card.querySelector('img');
                img.className = 'w-48 h-64 object-cover flex-shrink-0';
                const content = card.querySelector('.p-6');
                content.className = 'p-8 flex-1';
            });
        } else {
            container.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8';
            gridBtn.className = 'w-10 h-10 bg-accent text-white rounded-xl flex items-center justify-center hover:scale-110 transition-transform';
            listBtn.className = 'w-10 h-10 bg-gray-100 text-secondary rounded-xl flex items-center justify-center hover:scale-110 transition-transform';
            
            allBooks.forEach(book => {
                const card = book.querySelector('.card-modern');
                card.classList.remove('flex', 'flex-row', 'items-center');
                const img = card.querySelector('img');
                img.className = 'w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700';
                const content = card.querySelector('.p-8, .p-6');
                content.className = 'p-6 space-y-4';
            });
        }
    }
    
    // Event listeners
    document.getElementById('searchInput').addEventListener('input', filterBooks);
    document.getElementById('priceFilter').addEventListener('change', filterBooks);
    document.getElementById('genreFilter').addEventListener('change', filterBooks);
    document.getElementById('sortFilter').addEventListener('change', filterBooks);
</script>
@endpush
