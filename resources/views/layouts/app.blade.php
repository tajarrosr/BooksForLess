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
    <!-- Modern Navigation -->
    <nav class="nav-modern fixed top-0 left-0 right-0 z-50">
        <div class="container-modern">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('landing') }}" class="group flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-secondary rounded-2xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                                <i class="fas fa-book-open text-white text-xl"></i>
                            </div>
                            <div class="absolute -top-1 -right-1 w-4 h-4 bg-accent rounded-full animate-pulse-modern"></div>
                        </div>
                        <div>
                            <span class="text-2xl font-black text-gradient-modern">BooksForLess</span>
                            <div class="text-xs text-secondary font-medium -mt-1">Premium Books</div>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-12">
                    <a href="{{ route('landing') }}" class="nav-link-modern">Home</a>
                    <a href="{{ route('show-all.books') }}" class="nav-link-modern">Discover</a>
                    <a href="#" class="nav-link-modern">Categories</a>
                    <a href="#" class="nav-link-modern">About</a>
                    <a href="#" class="nav-link-modern">Contact</a>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-6">
                    @auth
                        <!-- User Profile -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 p-3 rounded-2xl hover:bg-white/50 transition-all duration-300">
                                @if(Auth::user()->picture)
                                    <img src="{{ asset(Auth::user()->picture) }}" alt="{{ Auth::user()->first_name }}" 
                                         class="w-10 h-10 rounded-full object-cover ring-2 ring-accent/20">
                                @else
                                    <div class="w-10 h-10 bg-gradient-to-br from-accent to-secondary text-white rounded-full flex items-center justify-center font-bold">
                                        {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="hidden sm:block text-left">
                                    <div class="text-sm font-semibold text-text">{{ Auth::user()->first_name }}</div>
                                    <div class="text-xs text-secondary">Premium Member</div>
                                </div>
                                <i class="fas fa-chevron-down text-secondary text-sm"></i>
                            </button>
                            
                            <!-- Dropdown -->
                            <div class="absolute right-0 mt-4 w-64 backdrop-modern rounded-3xl shadow-modern border border-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                                <div class="p-6">
                                    <div class="flex items-center space-x-3 mb-4 pb-4 border-b border-white/10">
                                        @if(Auth::user()->picture)
                                            <img src="{{ asset(Auth::user()->picture) }}" alt="{{ Auth::user()->first_name }}" 
                                                 class="w-12 h-12 rounded-full object-cover">
                                        @else
                                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-secondary text-white rounded-full flex items-center justify-center font-bold">
                                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-semibold text-text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                            <div class="text-xs text-secondary">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <a href="#" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-white/20 transition-colors text-text">
                                            <i class="fas fa-user w-4 text-accent"></i>
                                            <span class="text-sm">Profile</span>
                                        </a>
                                        <a href="#" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-white/20 transition-colors text-text">
                                            <i class="fas fa-heart w-4 text-accent"></i>
                                            <span class="text-sm">Wishlist</span>
                                        </a>
                                        <a href="#" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-white/20 transition-colors text-text">
                                            <i class="fas fa-history w-4 text-accent"></i>
                                            <span class="text-sm">Orders</span>
                                        </a>
                                        <div class="pt-2 border-t border-white/10">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-red-50 transition-colors text-red-600 w-full text-left">
                                                    <i class="fas fa-sign-out-alt w-4"></i>
                                                    <span class="text-sm">Logout</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-link-modern">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary-modern">Join Now</a>
                    @endauth

                    <!-- Cart -->
                    <a href="{{ route('checkout') }}" class="relative group">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-white/30 transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-shopping-bag text-xl text-text"></i>
                        </div>
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-accent text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center hidden animate-pulse-modern">0</span>
                    </a>

                    <!-- Mobile Menu -->
                    <button class="lg:hidden w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center hover:bg-white/30 transition-all duration-300" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl text-text"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden backdrop-modern border-t border-white/10 hidden">
            <div class="container-modern py-6">
                <div class="space-y-4">
                    <a href="{{ route('landing') }}" class="block py-3 text-text hover:text-accent font-medium transition-colors">Home</a>
                    <a href="{{ route('show-all.books') }}" class="block py-3 text-text hover:text-accent font-medium transition-colors">Discover</a>
                    <a href="#" class="block py-3 text-text hover:text-accent font-medium transition-colors">Categories</a>
                    <a href="#" class="block py-3 text-text hover:text-accent font-medium transition-colors">About</a>
                    <a href="#" class="block py-3 text-text hover:text-accent font-medium transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        @if(session('success'))
            <div class="fixed top-24 right-6 z-50 backdrop-modern rounded-2xl shadow-modern border border-green-200 p-4 animate-slide-up-modern">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-white text-sm"></i>
                    </div>
                    <span class="font-medium text-text">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="fixed top-24 right-6 z-50 backdrop-modern rounded-2xl shadow-modern border border-red-200 p-4 animate-slide-up-modern">
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
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

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
