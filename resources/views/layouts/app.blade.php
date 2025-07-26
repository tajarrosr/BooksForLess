<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BooksForLess')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-background grid-pattern">
    <!-- Ultra Compressed Navigation -->
<nav class="nav-modern fixed top-0 left-0 right-0 z-50">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14">
            <!-- Logo -->
            <div class="flex items-center space-x-2 flex-shrink-0">
                <a href="{{ route('show-all.books') }}" class="group flex items-center space-x-2">
                    <img src="{{ asset('assets/images/logo.png') }}" 
                         alt="BooksForLess Logo" 
                         class="w-7 h-7 object-contain transform group-hover:scale-110 transition-transform duration-300">
                    <span class="text-base font-black text-gradient-modern hidden sm:block">BooksForLess</span>
                </a>
            </div>

            <!-- Center Search Bar -->
            <div class="flex-1 max-w-md mx-4 hidden sm:block">
                <form action="{{ route('books.search') }}" method="GET" class="relative">
                    <input type="text" 
                           name="query"
                           placeholder="Search books or authors..." 
                           class="w-full px-3 py-2 pl-9 pr-3 rounded-full border border-gray-400 focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all duration-300 bg-white/80 backdrop-blur-sm text-sm"
                           value="{{ request('query') }}">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-secondary text-sm">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-2">
                <!-- Mobile Search Icon -->
                <button class="sm:hidden w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white/30 transition-all duration-300">
                    <i class="fas fa-search text-sm text-text"></i>
                </button>

                <!-- Cart -->
                <a href="{{ route('checkout') }}" class="relative group">
                    <div class="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                        <i class="fas fa-shopping-bag text-sm text-text"></i>
                    </div>
                    <span id="cart-count" class="absolute -top-1 -right-1 bg-accent text-white text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center hidden animate-pulse-modern">0</span>
                </a>

                @auth
                    <!-- User Profile -->
                    <div class="relative group">
                        <button class="flex items-center space-x-1 p-1 rounded-lg hover:bg-white/50 transition-all duration-300">
                            @if(Auth::user()->picture)
                                <img src="{{ asset(Auth::user()->picture) }}" alt="{{ Auth::user()->first_name }}" 
                                     class="w-7 h-7 rounded-full object-cover ring-2 ring-accent/20">
                            @else
                                <div class="w-7 h-7 bg-gradient-to-br from-accent to-secondary text-white rounded-full flex items-center justify-center font-bold text-xs">
                                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="hidden lg:block text-sm font-semibold text-text">{{ Auth::user()->first_name }}</span>
                            <i class="fas fa-chevron-down text-secondary text-xs hidden lg:block"></i>
                        </button>
                        
                        <!-- User Dropdown -->
                        <div class="absolute right-0 mt-2 w-48 backdrop-modern rounded-xl shadow-modern border border-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="p-3">
                                <div class="flex items-center space-x-2 mb-3 pb-3 border-b border-white/10">
                                    @if(Auth::user()->picture)
                                        <img src="{{ asset(Auth::user()->picture) }}" alt="{{ Auth::user()->first_name }}" 
                                             class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <div class="w-8 h-8 bg-gradient-to-br from-accent to-secondary text-white rounded-full flex items-center justify-center font-bold text-xs">
                                            {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-semibold text-text text-xs">{{ Auth::user()->first_name }}</div>
                                        <div class="text-xs text-secondary truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <a href="{{ route('show-all.books') }}" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 transition-colors text-text">
                                        <i class="fas fa-compass w-3 text-accent"></i>
                                        <span class="text-xs">Discover</span>
                                    </a>
                                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 transition-colors text-text">
                                        <i class="fas fa-info-circle w-3 text-accent"></i>
                                        <span class="text-xs">About</span>
                                    </a>
                                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 transition-colors text-text">
                                        <i class="fas fa-user w-3 text-accent"></i>
                                        <span class="text-xs">Profile</span>
                                    </a>
                                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 transition-colors text-text">
                                        <i class="fas fa-heart w-3 text-accent"></i>
                                        <span class="text-xs">Wishlist</span>
                                    </a>
                                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-white/20 transition-colors text-text">
                                        <i class="fas fa-history w-3 text-accent"></i>
                                        <span class="text-xs">Orders</span>
                                    </a>
                                    <div class="pt-2 border-t border-white/10">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-red-50 transition-colors text-red-600 w-full text-left">
                                                <i class="fas fa-sign-out-alt w-3"></i>
                                                <span class="text-xs">Logout</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-2">
                        {{-- Login link visible on all screen sizes --}}
                        <a href="{{ route('login') }}" class="text-sm font-medium text-text hover:text-accent transition-colors">Login</a>
                        {{-- Join Now button with rounded-lg --}}
                        <a href="{{ route('register') }}" class="px-3 py-1.5 bg-accent text-white rounded-lg font-semibold text-sm hover:bg-accent/90 transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-accent/25">Join Now</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="pt-14">
        @if(session('success'))
            <div class="fixed top-20 right-6 z-50 backdrop-modern rounded-2xl shadow-modern border border-green-200 p-4 animate-slide-up-modern">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-white text-sm"></i>
                    </div>
                    <span class="font-medium text-text">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="fixed top-20 right-6 z-50 backdrop-modern rounded-2xl shadow-modern border border-red-200 p-4 animate-slide-up-modern">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation text-white text-sm"></i>
                    </div>
                    <span class="font-medium text-text">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="bg-text text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-text via-secondary to-text"></div>
        <div class="relative">
            <!-- Main Footer -->
            <div class="section-modern">
                <div class="container-modern">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                        <!-- Brand Section -->
                        <div class="lg:col-span-5">
                            <div class="flex items-center space-x-3 mb-8">
                                <div class="w-16 h-16 bg-gradient-to-br from-accent to-secondary rounded-3xl flex items-center justify-center">
                                    <i class="fas fa-book-open text-white text-2xl"></i>
                                </div>
                                <div>
                                    <span class="text-3xl font-black text-white">BooksForLess</span>
                                    <div class="text-sm text-white/60 font-medium">Premium Books</div>
                                </div>
                            </div>
                            <p class="text-lg text-white/80 mb-8 leading-relaxed max-w-md">
                                Discover extraordinary stories at unbeatable prices. Your gateway to endless adventures through the world of books.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-accent hover:scale-110 transition-all duration-300">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                                <a href="#" class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-accent hover:scale-110 transition-all duration-300">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-accent hover:scale-110 transition-all duration-300">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                                <a href="#" class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-accent hover:scale-110 transition-all duration-300">
                                    <i class="fab fa-linkedin-in text-xl"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Links Sections -->
                        <div class="lg:col-span-7 grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Explore -->
                            <div>
                                <h3 class="text-xl font-bold text-white mb-6">Explore</h3>
                                <ul class="space-y-4">
                                    <li><a href="{{ route('show-all.books') }}" class="text-white/70 hover:text-accent transition-colors font-medium">Discover Books</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">New Releases</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Bestsellers</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Categories</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Authors</a></li>
                                </ul>
                            </div>

                            <!-- Support -->
                            <div>
                                <h3 class="text-xl font-bold text-white mb-6">Support</h3>
                                <ul class="space-y-4">
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Help Center</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Contact Us</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Shipping Info</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">Returns</a></li>
                                    <li><a href="#" class="text-white/70 hover:text-accent transition-colors font-medium">FAQ</a></li>
                                </ul>
                            </div>

                            <!-- Contact -->
                            <div>
                                <h3 class="text-xl font-bold text-white mb-6">Contact</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-envelope text-accent"></i>
                                        <span class="text-white/70">hello@booksforless.com</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-phone text-accent"></i>
                                        <span class="text-white/70">+63 123 456 7890</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <i class="fas fa-map-marker-alt text-accent"></i>
                                        <span class="text-white/70">Manila, Philippines</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-white/10 py-8">
                <div class="container-modern">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="text-white/60 font-medium">© {{ date('Y') }} BooksForLess. Crafted with ❤️ for book lovers.</p>
                        <div class="flex space-x-8">
                            <a href="#" class="text-white/60 hover:text-accent transition-colors font-medium">Privacy</a>
                            <a href="#" class="text-white/60 hover:text-accent transition-colors font-medium">Terms</a>
                            <a href="#" class="text-white/60 hover:text-accent transition-colors font-medium">Cookies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
    // Set global authentication status
    @auth
        window.isAuthenticated = true;
    @else
        window.isAuthenticated = false;
    @endauth

    // Update cart counter
    function updateCartCounters() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        
        const cartCounter = document.getElementById('cart-count');
        if (cartCounter) {
            cartCounter.textContent = totalItems;
            cartCounter.style.display = totalItems > 0 ? 'flex' : 'none';
        }
    }

    // Initialize cart counter
    updateCartCounters();

    // Auto-hide notifications
    setTimeout(() => {
        const notifications = document.querySelectorAll('.animate-slide-up-modern');
        notifications.forEach(notification => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        });
    }, 4000);
</script>

    @stack('scripts')
</body>
</html>
