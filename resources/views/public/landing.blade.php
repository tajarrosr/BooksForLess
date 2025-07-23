@extends('layouts.minimal')

@section('title', 'BooksForLess - Premium Books at Unbeatable Prices')

@section('content')
<!-- Hero Section Only -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/landing-page/banner.jpg') }}" 
             alt="Amazing Stories Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/20 via-transparent to-slate-900/20"></div>
    </div>

    <!-- Floating Elements Overlay -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 animate-float-modern opacity-20" style="animation-delay: 0s;">
            <i class="fas fa-book text-6xl text-indigo-300"></i>
        </div>
        <div class="absolute top-1/3 right-1/4 animate-float-modern opacity-20" style="animation-delay: 2s;">
            <i class="fas fa-feather-alt text-4xl text-indigo-300"></i>
        </div>
        <div class="absolute bottom-1/4 left-1/3 animate-float-modern opacity-20" style="animation-delay: 4s;">
            <i class="fas fa-scroll text-5xl text-indigo-300"></i>
        </div>
        <div class="absolute bottom-1/3 right-1/3 animate-float-modern opacity-20" style="animation-delay: 1s;">
            <i class="fas fa-quill-pen text-3xl text-indigo-300"></i>
        </div>
    </div>

    <div class="container-modern relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Hero Content -->
            <div class="text-center lg:text-left space-y-8">
                <div class="space-y-6">
                    <div class="inline-flex items-center space-x-2 bg-white/90 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg">
                        <div class="w-2 h-2 bg-accent rounded-full animate-pulse-modern"></div>
                        <span class="text-accent font-semibold text-sm">Premium Book Collection</span>
                    </div>
                    
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-none">
                        Discover
                        <span class="block text-accent">Amazing</span>
                        <span class="block">Stories</span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-white leading-relaxed max-w-2xl">
                        Immerse yourself in extraordinary worlds with our curated collection of premium books at prices that won't break the bank.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="{{ route('show-all.books') }}" class="btn-primary-modern group shadow-2xl">
                        <i class="fas fa-compass mr-3 group-hover:rotate-180 transition-transform duration-500"></i>
                        Explore Collection
                    </a>
                </div>
            </div>
            
            <!-- Hero Visual - Genre Cards -->
            <div class="relative">
                <div class="relative z-10">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl">
                                <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-4">
                                    <i class="fas fa-book-open text-white text-xl"></i>
                                </div>
                                <h3 class="text-slate-800 font-bold text-lg mb-2">Fiction</h3>
                                <p class="text-slate-600 text-sm">Escape into imaginary worlds</p>
                            </div>
                            <div class="card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl" style="animation-delay: 0.2s;">
                                <div class="w-12 h-12 bg-pink-500 rounded-2xl flex items-center justify-center mb-4">
                                    <i class="fas fa-heart text-white text-xl"></i>
                                </div>
                                <h3 class="text-slate-800 font-bold text-lg mb-2">Romance</h3>
                                <p class="text-slate-600 text-sm">Love stories that inspire</p>
                            </div>
                        </div>
                        <div class="space-y-6 pt-12">
                            <div class="card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl" style="animation-delay: 0.4s;">
                                <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center mb-4">
                                    <i class="fas fa-rocket text-white text-xl"></i>
                                </div>
                                <h3 class="text-slate-800 font-bold text-lg mb-2">Sci-Fi</h3>
                                <p class="text-slate-600 text-sm">Future possibilities</p>
                            </div>
                            <div class="card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl" style="animation-delay: 0.6s;">
                                <div class="w-12 h-12 bg-secondary rounded-2xl flex items-center justify-center mb-4">
                                    <i class="fas fa-search text-white text-xl"></i>
                                </div>
                                <h3 class="text-slate-800 font-bold text-lg mb-2">Mystery</h3>
                                <p class="text-slate-600 text-sm">Thrilling adventures</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background Glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-accent/10 to-secondary/10 rounded-3xl blur-3xl"></div>
            </div>
        </div>
    </div>
</section>
@endsection
