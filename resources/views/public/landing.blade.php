@extends('layouts.app')

@section('title', 'BooksForLess - Affordable Books for Everyone')

@section('content')
<!-- Hero Section -->
<div class="hero min-h-screen hero-gradient relative overflow-hidden">
    <div class="hero-overlay bg-opacity-20"></div>
    <div class="hero-content text-center text-neutral-content z-10">
        <div class="max-w-4xl hero-content animate-fade-in">
            <h1 class="mb-8 text-5xl md:text-7xl font-bold leading-tight">
                Discover Amazing Books at 
                <span class="text-accent">Unbeatable Prices</span>
            </h1>
            <p class="mb-8 text-xl md:text-2xl font-light max-w-2xl mx-auto leading-relaxed">
                Find your next favorite read from our vast collection of affordable books. 
                From bestsellers to hidden gems, we have something for every reader.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('show-all.books') }}" class="btn btn-lg btn-primary btn-gradient shadow-lg">
                    <i class="fas fa-search"></i>
                    Browse Books
                </a>
                <a href="{{ route('register') }}" class="btn btn-lg btn-outline btn-accent">
                    <i class="fas fa-user-plus"></i>
                    Join Now
                </a>
            </div>
        </div>
    </div>
    
    <!-- Floating Books Animation -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 animate-bounce-gentle opacity-20">
            <i class="fas fa-book text-6xl text-white"></i>
        </div>
        <div class="absolute top-40 right-20 animate-bounce-gentle opacity-20" style="animation-delay: 1s;">
            <i class="fas fa-book-open text-4xl text-white"></i>
        </div>
        <div class="absolute bottom-40 left-20 animate-bounce-gentle opacity-20" style="animation-delay: 2s;">
            <i class="fas fa-bookmark text-5xl text-white"></i>
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="py-20 bg-base-200">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gradient">Why Choose BooksForLess?</h2>
            <p class="text-xl text-base-content/70 max-w-2xl mx-auto">
                We make reading affordable and accessible for everyone
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card bg-base-100 shadow-xl stat-card">
                <div class="card-body text-center">
                    <div class="mx-auto w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-dollar-sign text-3xl text-primary"></i>
                    </div>
                    <h3 class="card-title justify-center text-2xl mb-4">Affordable Prices</h3>
                    <p class="text-base-content/70">Get the best deals on books with prices up to 70% off retail.</p>
                </div>
            </div>
            
            <div class="card bg-base-100 shadow-xl stat-card">
                <div class="card-body text-center">
                    <div class="mx-auto w-20 h-20 bg-success/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shipping-fast text-3xl text-success"></i>
                    </div>
                    <h3 class="card-title justify-center text-2xl mb-4">Fast Delivery</h3>
                    <p class="text-base-content/70">Quick and reliable shipping to get your books to you as soon as possible.</p>
                </div>
            </div>
            
            <div class="card bg-base-100 shadow-xl stat-card">
                <div class="card-body text-center">
                    <div class="mx-auto w-20 h-20 bg-info/10 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-book text-3xl text-info"></i>
                    </div>
                    <h3 class="card-title justify-center text-2xl mb-4">Vast Collection</h3>
                    <p class="text-base-content/70">Thousands of titles across all genres and categories.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Categories -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gradient">Popular Categories</h2>
            <p class="text-xl text-base-content/70 max-w-2xl mx-auto">
                Explore books by your favorite genres
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
                $categories = [
                    ['name' => 'Fiction', 'icon' => 'fas fa-magic', 'color' => 'primary'],
                    ['name' => 'Romance', 'icon' => 'fas fa-heart', 'color' => 'error'],
                    ['name' => 'Mystery', 'icon' => 'fas fa-search', 'color' => 'neutral'],
                    ['name' => 'Sci-Fi', 'icon' => 'fas fa-rocket', 'color' => 'info'],
                    ['name' => 'Self-Help', 'icon' => 'fas fa-lightbulb', 'color' => 'warning'],
                    ['name' => 'Children', 'icon' => 'fas fa-child', 'color' => 'success']
                ];
            @endphp
            
            @foreach($categories as $category)
            <a href="{{ route('show-all.books') }}" class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="card-body items-center text-center p-6">
                    <div class="w-16 h-16 bg-{{ $category['color'] }}/10 rounded-full flex items-center justify-center mb-4">
                        <i class="{{ $category['icon'] }} text-2xl text-{{ $category['color'] }}"></i>
                    </div>
                    <h3 class="card-title text-sm">{{ $category['name'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 hero-gradient">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Start Reading?</h2>
            <p class="text-xl mb-8 opacity-90">Join thousands of book lovers who save money on their favorite reads</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('show-all.books') }}" class="btn btn-lg btn-accent shadow-lg">
                    <i class="fas fa-book-open"></i>
                    Start Shopping
                </a>
                <a href="{{ route('register') }}" class="btn btn-lg btn-outline btn-accent">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
