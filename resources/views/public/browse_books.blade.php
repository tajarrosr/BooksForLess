<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books - BooksForLess</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/landing-page/BOOKS4LESS-LOGO.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user_styles.css') }}" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 4rem 0 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="books" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5" width="20" height="20"/></pattern></defs><rect width="100" height="100" fill="url(%23books)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: clamp(1rem, 3vw, 1.5rem);
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .search-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin: -2rem 1rem 3rem;
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }
        
        .search-grid {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 1rem;
            align-items: end;
        }
        
        .search-input-wrapper {
            position: relative;
        }
        
        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--border-color);
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .filter-select {
            padding: 1rem;
            border: 2px solid var(--border-color);
            border-radius: 0.75rem;
            background: var(--bg-color);
            color: var(--text-color);
            font-size: 1rem;
            min-width: 150px;
            cursor: pointer;
        }
        
        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 0 1rem;
        }
        
        .book-card {
            background: var(--card-bg);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .book-image-wrapper {
            position: relative;
            height: 320px;
            overflow: hidden;
        }
        
        .book-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .book-card:hover .book-image {
            transform: scale(1.05);
        }
        
        .book-stock-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--success-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .book-stock-badge.out-of-stock {
            background: var(--error-color);
        }
        
        .book-info {
            padding: 1.5rem;
        }
        
        .book-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .book-author {
            color: #6b7280;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        
        .book-genres {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .genre-tag {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .book-description {
            color: #6b7280;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .book-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
        
        .book-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .add-to-cart-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(59, 130, 246, 0.3);
        }
        
        .add-to-cart-btn:disabled {
            background: #6b7280;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .scroll-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        
        .scroll-to-top:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0 2rem;
            }
            
            .search-section {
                margin: -1.5rem 1rem 2rem;
                padding: 1.5rem;
            }
            
            .search-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
                padding: 0 0.5rem;
            }
            
            .book-info {
                padding: 1rem;
            }
            
            .scroll-to-top {
                bottom: 1rem;
                right: 1rem;
                width: 45px;
                height: 45px;
            }
        }
        
        @media (max-width: 480px) {
            .books-grid {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }
            
            .search-section {
                margin: -1rem 0.5rem 1.5rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('components.navbar')
    @include('components.cart-slider')
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Discover Amazing Books</h1>
            <p class="hero-subtitle">Find your next favorite read from our collection of preowned books at unbeatable prices</p>
        </div>
    </section>
    
    <!-- Search Section -->
    <div class="container">
        <div class="search-section">
            <div class="search-grid">
                <div class="search-input-wrapper">
                    <i class="fas fa-search search-icon"></i>
                    <input 
                        type="text" 
                        id="search-input" 
                        placeholder="Search by title, author, or genre..." 
                        class="search-input"
                        onkeyup="filterBooks()"
                    >
                </div>
                <select id="genre-filter" class="filter-select" onchange="filterBooks()">
                    <option value="">All Genres</option>
                    @foreach(config('book_genres') as $genre)
                        <option value="{{ $genre }}">{{ $genre }}</option>
                    @endforeach
                </select>
                <select id="sort-filter" class="filter-select" onchange="sortBooks()">
                    <option value="title">Sort by Title</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="author">Sort by Author</option>
                </select>
            </div>
        </div>
        
        <!-- Books Grid -->
        <div class="books-grid" id="books-container">
            @forelse($books as $book)
                <div class="book-card" 
                     data-title="{{ strtolower($book->book_title) }}" 
                     data-author="{{ strtolower($book->book_author) }}" 
                     data-price="{{ $book->book_price }}" 
                     data-genres="{{ strtolower(is_array($book->book_genres) ? implode(',', $book->book_genres) : $book->book_genres) }}">
                    
                    <div class="book-image-wrapper">
                        <img 
                            src="{{ asset('storage/' . $book->book_tmb) }}" 
                            alt="{{ $book->book_title }}" 
                            class="book-image"
                            onerror="this.src='{{ asset('assets/images/placeholder-book.jpg') }}'"
                        >
                        <div class="book-stock-badge {{ $book->book_stock <= 0 ? 'out-of-stock' : '' }}">
                            {{ $book->book_stock > 0 ? $book->book_stock . ' in stock' : 'Out of stock' }}
                        </div>
                    </div>
                    
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->book_title }}</h3>
                        <p class="book-author">by {{ $book->book_author }}</p>
                        
                        <div class="book-genres">
                            @if(is_array($book->book_genres))
                                @foreach(array_slice($book->book_genres, 0, 2) as $genre)
                                    <span class="genre-tag">{{ $genre }}</span>
                                @endforeach
                                @if(count($book->book_genres) > 2)
                                    <span class="genre-tag">+{{ count($book->book_genres) - 2 }}</span>
                                @endif
                            @else
                                <span class="genre-tag">{{ $book->book_genres }}</span>
                            @endif
                        </div>
                        
                        <p class="book-description">{{ $book->book_desc }}</p>
                        
                        <div class="book-footer">
                            <div class="book-price">₱{{ number_format($book->book_price, 2) }}</div>
                            @if($book->book_stock > 0)
                                <button 
                                    class="add-to-cart-btn"
                                    onclick="addToCart({{ $book->id }}, '{{ addslashes($book->book_title) }}', '{{ addslashes($book->book_author) }}', {{ $book->book_price }}, '{{ asset('storage/' . $book->book_tmb) }}')"
                                >
                                    <i class="fas fa-cart-plus"></i>
                                    Add to Cart
                                </button>
                            @else
                                <button class="add-to-cart-btn" disabled>
                                    <i class="fas fa-times"></i>
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state" style="grid-column: 1 / -1;">
                    <i class="fas fa-book empty-icon"></i>
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No Books Available</h3>
                    <p>Check back later for new arrivals!</p>
                </div>
            @endforelse
        </div>
        
        <!-- No Results Message -->
        <div id="no-results" class="empty-state" style="display: none;">
            <i class="fas fa-search empty-icon"></i>
            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No Books Found</h3>
            <p>Try adjusting your search or filter criteria.</p>
            <button onclick="clearFilters()" class="btn btn-primary" style="margin-top: 1rem;">
                <i class="fas fa-refresh"></i> Clear Filters
            </button>
        </div>
    </div>
    
    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scroll-to-top" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        let allBooks = [];
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        document.addEventListener('DOMContentLoaded', function() {
            initializeBooks();
            initializeScrollButton();
            showLoadingAnimation();
        });
        
        function initializeBooks() {
            const bookCards = document.querySelectorAll('.book-card');
            allBooks = Array.from(bookCards).map(card => ({
                element: card,
                title: card.dataset.title,
                author: card.dataset.author,
                price: parseFloat(card.dataset.price),
                genres: card.dataset.genres
            }));
        }
        
        function initializeScrollButton() {
            window.addEventListener('scroll', function() {
                const scrollBtn = document.getElementById('scroll-to-top');
                if (window.pageYOffset > 300) {
                    scrollBtn.style.display = 'flex';
                } else {
                    scrollBtn.style.display = 'none';
                }
            });
        }
        
        function showLoadingAnimation() {
            // Add loading animation to images
            const images = document.querySelectorAll('.book-image');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
            });
        }
        
        function filterBooks() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const genreFilter = document.getElementById('genre-filter').value.toLowerCase();
            const noResults = document.getElementById('no-results');
            
            let visibleCount = 0;
            
            allBooks.forEach(book => {
                const matchesSearch = book.title.includes(searchTerm) || 
                                    book.author.includes(searchTerm) || 
                                    book.genres.includes(searchTerm);
                const matchesGenre = !genreFilter || book.genres.includes(genreFilter);
                
                if (matchesSearch && matchesGenre) {
                    book.element.style.display = 'block';
                    visibleCount++;
                } else {
                    book.element.style.display = 'none';
                }
            });
            
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }
        
        function sortBooks() {
            const sortBy = document.getElementById('sort-filter').value;
            const container = document.getElementById('books-container');
            
            const sortedBooks = [...allBooks].sort((a, b) => {
                switch(sortBy) {
                    case 'title':
                        return a.title.localeCompare(b.title);
                    case 'author':
                        return a.author.localeCompare(b.author);
                    case 'price-low':
                        return a.price - b.price;
                    case 'price-high':
                        return b.price - a.price;
                    default:
                        return 0;
                }
            });
            
            sortedBooks.forEach(book => {
                container.appendChild(book.element);
            });
        }
        
        function clearFilters() {
            document.getElementById('search-input').value = '';
            document.getElementById('genre-filter').value = '';
            document.getElementById('sort-filter').value = 'title';
            filterBooks();
            sortBooks();
        }
        
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Enhanced add to cart with animation
        function addToCart(bookId, title, author, price, image) {
            const existingItem = cart.find(item => item.id === bookId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: bookId,
                    title: title,
                    author: author,
                    price: parseFloat(price),
                    image: image,
                    quantity: 1
                });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            
            // Show success animation
            showAddToCartSuccess();
        }
        
        function showAddToCartSuccess() {
            // Create and show a toast notification
            const toast = document.createElement('div');
            toast.innerHTML = `
                <div style="position: fixed; top: 100px; right: 20px; background: var(--success-color); color: white; padding: 1rem 1.5rem; border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.15); z-index: 9999; transform: translateX(100%); transition: transform 0.3s ease;">
                    <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                    Book added to cart!
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.firstElementChild.style.transform = 'translateX(0)';
            }, 100);
            
            // Animate out and remove
            setTimeout(() => {
                toast.firstElementChild.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
        
        function updateCartCount() {
            // Update cart count display logic here
        }
    </script>
</body>
</html>
