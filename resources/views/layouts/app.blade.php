<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BooksForLess')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-base-100">
    <!-- Navigation -->
    <div class="navbar bg-base-100 shadow-lg sticky top-0 z-40 backdrop-blur-md bg-base-100/95">
        <div class="navbar-start">
            <div class="dropdown lg:hidden">
                <div tabindex="0" role="button" class="btn btn-ghost">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{ route('landing') }}">Home</a></li>
                    <li><a href="{{ route('show-all.books') }}">Browse Books</a></li>
                </ul>
            </div>
            <a href="{{ route('landing') }}" class="btn btn-ghost text-xl font-bold text-gradient">
                <i class="fas fa-book-open"></i>
                BooksForLess
            </a>
        </div>
        
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('landing') }}" class="font-medium">Home</a></li>
                <li><a href="{{ route('show-all.books') }}" class="font-medium">Browse Books</a></li>
            </ul>
        </div>
        
        <div class="navbar-end gap-2">
            <!-- Theme Toggle -->
            <button class="btn btn-ghost btn-circle" onclick="toggleTheme()">
                <i class="fas fa-moon text-lg"></i>
            </button>
            
            @auth
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            @if(Auth::user()->picture)
                                <img src="{{ asset(Auth::user()->picture) }}" alt="{{ Auth::user()->first_name }}" />
                            @else
                                <div class="bg-primary text-primary-content w-10 h-10 rounded-full flex items-center justify-center">
                                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li class="menu-title">
                            <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </li>
                        <li><a><i class="fas fa-user"></i>Profile</a></li>
                        <li><a><i class="fas fa-heart"></i>Wishlist</a></li>
                        <li><a><i class="fas fa-clock"></i>Order History</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endauth
            
            <div class="indicator">
                <a href="{{ route('checkout') }}" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span class="badge badge-sm badge-primary indicator-item" id="cart-count">0</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="toast toast-top toast-center z-50">
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="toast toast-top toast-center z-50">
                <div class="alert alert-error">
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer footer-center p-10 bg-neutral text-neutral-content mt-20">
        <aside>
            <div class="text-4xl font-bold text-gradient mb-4">
                <i class="fas fa-book-open"></i>
                BooksForLess
            </div>
            <p class="font-bold text-lg">Your one-stop shop for affordable books</p>
            <p>Discover, read, and save on thousands of titles</p>
        </aside>
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a href="#" class="btn btn-ghost btn-circle">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="btn btn-ghost btn-circle">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="btn btn-ghost btn-circle">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#" class="btn btn-ghost btn-circle">
                    <i class="fab fa-linkedin-in text-xl"></i>
                </a>
            </div>
        </nav>
        <aside>
            <p>Copyright © {{ date('Y') }} - All rights reserved by BooksForLess</p>
        </aside>
    </footer>

    @stack('scripts')
</body>
</html>
