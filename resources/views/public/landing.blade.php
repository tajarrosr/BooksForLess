@extends('layouts.minimal')

@section('title', 'BooksForLess - Premium Books at Unbeatable Prices')

@section('content')
<!-- Hero Section with Animations -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Animated Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/landing-page/banner.jpg') }}" 
             alt="Amazing Stories Background" 
             class="w-full h-full object-cover animate-ken-burns">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/20 via-transparent to-slate-900/20 animate-gradient-shift"></div>
    </div>

    <!-- Animated Floating Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="floating-element absolute top-1/4 left-1/4 animate-float-1 opacity-20">
            <i class="fas fa-book text-6xl text-indigo-300 animate-pulse-slow"></i>
        </div>
        <div class="floating-element absolute top-1/3 right-1/4 animate-float-2 opacity-20">
            <i class="fas fa-feather-alt text-4xl text-indigo-300 animate-bounce-slow"></i>
        </div>
        <div class="floating-element absolute bottom-1/4 left-1/3 animate-float-3 opacity-20">
            <i class="fas fa-scroll text-5xl text-indigo-300 animate-spin-slow"></i>
        </div>
        <div class="floating-element absolute bottom-1/3 right-1/3 animate-float-4 opacity-20">
            <i class="fas fa-quill-pen text-3xl text-indigo-300 animate-wiggle"></i>
        </div>
        
        <!-- Animated Particles -->
        <div class="particles">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>
    </div>

    <div class="container-modern relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Hero Content with Staggered Animations -->
            <div class="text-center lg:text-left space-y-8">
                <div class="space-y-6">
                    <!-- Animated Logo Badge -->
                    <div class="logo-badge inline-flex items-center space-x-3 bg-white/90 backdrop-blur-sm rounded-full px-6 py-3 shadow-lg animate-slide-down">
                        <img src="{{ asset('assets/images/logo.png') }}" 
                             alt="BooksForLess Logo" 
                             class="w-6 h-6 object-contain animate-rotate-in">
                        <span class="text-accent font-semibold text-sm animate-fade-in-right">BooksForLess</span>
                    </div>
                    
                    <!-- Animated Main Heading -->
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-none">
                        <span class="block animate-slide-up-1">Discover</span>
                        <span class="block text-accent animate-slide-up-2">Amazing</span>
                        <span class="block animate-slide-up-3">Stories</span>
                    </h1>
                    
                    <!-- Animated Description -->
                    <p class="text-xl md:text-2xl text-white leading-relaxed max-w-2xl animate-fade-in-up">
                        <span class="typing-text">Immerse yourself in extraordinary worlds with our <br>curated collection of premium books at prices that <br>won't break the bank.</span>
                    </p>
                </div>
                
                <!-- Animated Button -->
                <div class="flex flex-col sm:flex-row gap-6 animate-slide-up-button">
                    <a href="{{ route('show-all.books') }}" class="btn-primary-modern group shadow-2xl animate-bounce-in">
                        <i class="fas fa-compass mr-3 group-hover:rotate-180 transition-transform duration-500 animate-spin-on-load"></i>
                        <span class="animate-text-glow">Explore Collection</span>
                    </a>
                </div>
            </div>
            
            <!-- Animated Genre Cards -->
            <div class="relative animate-fade-in-right-delayed">
                <div class="relative z-10">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <!-- Fiction Card -->
                            <div class="genre-card card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl cursor-pointer overflow-hidden relative animate-card-1">
                                <div class="text-content transition-all duration-500">
                                    <div class="w-12 h-12 bg-accent rounded-2xl flex items-center justify-center mb-4 animate-icon-bounce">
                                        <i class="fas fa-book-open text-white text-xl"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-lg mb-2 animate-text-slide">Fiction</h3>
                                    <p class="text-slate-600 text-sm animate-text-fade">Escape into imaginary worlds</p>
                                </div>
                                <div class="image-content absolute inset-0 p-6 opacity-0 transition-all duration-500 flex items-center justify-center">
                                    <img src="/assets/images/landing-page/pic1.jpg?height=120&width=120&text=Fiction+Books" 
                                         alt="Fiction Books" 
                                         class="w-full h-full object-fit rounded-xl animate-image-zoom">
                                </div>
                            </div>
                            
                            <!-- Romance Card -->
                            <div class="genre-card card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl cursor-pointer overflow-hidden relative animate-card-2">
                                <div class="text-content transition-all duration-500">
                                    <div class="w-12 h-12 bg-pink-500 rounded-2xl flex items-center justify-center mb-4 animate-icon-bounce">
                                        <i class="fas fa-heart text-white text-xl animate-heartbeat"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-lg mb-2 animate-text-slide">Romance</h3>
                                    <p class="text-slate-600 text-sm animate-text-fade">Love stories that inspire</p>
                                </div>
                                <div class="image-content absolute inset-0 p-6 opacity-0 transition-all duration-500 flex items-center justify-center">
                                    <img src="/assets/images/landing-page/pic2.jpg?height=120&width=120&text=Romance+Books" 
                                         alt="Romance Books" 
                                         class="w-full h-full object-fit rounded-xl animate-image-zoom">
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6 pt-12">
                            <!-- Sci-Fi Card -->
                            <div class="genre-card card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl cursor-pointer overflow-hidden relative animate-card-3">
                                <div class="text-content transition-all duration-500">
                                    <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center mb-4 animate-icon-bounce">
                                        <i class="fas fa-rocket text-white text-xl animate-rocket"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-lg mb-2 animate-text-slide">Sci-Fi</h3>
                                    <p class="text-slate-600 text-sm animate-text-fade">Future possibilities</p>
                                </div>
                                <div class="image-content absolute inset-0 p-6 opacity-0 transition-all duration-500 flex items-center justify-center">
                                    <img src="/assets/images/landing-page/pic3.jpg?height=120&width=120&text=Sci-Fi+Books" 
                                         alt="Sci-Fi Books" 
                                         class="w-full h-full object-fit rounded-xl animate-image-zoom">
                                </div>
                            </div>
                            
                            <!-- Mystery Card -->
                            <div class="genre-card card-floating p-6 bg-white/90 backdrop-blur-sm shadow-2xl cursor-pointer overflow-hidden relative animate-card-4">
                                <div class="text-content transition-all duration-500">
                                    <div class="w-12 h-12 bg-secondary rounded-2xl flex items-center justify-center mb-4 animate-icon-bounce">
                                        <i class="fas fa-search text-white text-xl animate-search"></i>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-lg mb-2 animate-text-slide">Mystery</h3>
                                    <p class="text-slate-600 text-sm animate-text-fade">Thrilling adventures</p>
                                </div>
                                <div class="image-content absolute inset-0 p-6 opacity-0 transition-all duration-500 flex items-center justify-center">
                                    <img src="/assets/images/landing-page/pic4.png?height=120&width=120&text=Mystery+Books" 
                                         alt="Mystery Books" 
                                         class="w-full h-full object-fit rounded-xl animate-image-zoom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Animated Background Glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-accent/10 to-secondary/10 rounded-3xl blur-3xl animate-glow-pulse"></div>
            </div>
        </div>
    </div>
</section>

<style>
/* Page Load Animations */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp1 {
    from {
        opacity: 0;
        transform: translateY(100px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp2 {
    from {
        opacity: 0;
        transform: translateY(100px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp3 {
    from {
        opacity: 0;
        transform: translateY(100px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRightDelayed {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3) translateY(50px);
    }
    50% {
        opacity: 1;
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

@keyframes rotateIn {
    from {
        opacity: 0;
        transform: rotate(-180deg) scale(0);
    }
    to {
        opacity: 1;
        transform: rotate(0deg) scale(1);
    }
}

/* Floating Animations */
@keyframes float1 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    33% {
        transform: translateY(-20px) rotate(5deg);
    }
    66% {
        transform: translateY(10px) rotate(-3deg);
    }
}

@keyframes float2 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-15px) rotate(-5deg);
    }
}

@keyframes float3 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    33% {
        transform: translateY(15px) rotate(3deg);
    }
    66% {
        transform: translateY(-10px) rotate(-2deg);
    }
}

@keyframes float4 {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    25% {
        transform: translateY(-10px) rotate(2deg);
    }
    75% {
        transform: translateY(5px) rotate(-1deg);
    }
}

/* Background Animations */
@keyframes kenBurns {
    0% {
        transform: scale(1) rotate(0deg);
    }
    100% {
        transform: scale(1.1) rotate(0.5deg);
    }
}

@keyframes gradientShift {
    0%, 100% {
        background: linear-gradient(45deg, rgba(99, 102, 241, 0.2), rgba(148, 163, 184, 0.2));
    }
    50% {
        background: linear-gradient(45deg, rgba(148, 163, 184, 0.2), rgba(99, 102, 241, 0.2));
    }
}

/* Card Animations */
@keyframes card1 {
    from {
        opacity: 0;
        transform: translateY(50px) rotate(-5deg);
    }
    to {
        opacity: 1;
        transform: translateY(0) rotate(0deg);
    }
}

@keyframes card2 {
    from {
        opacity: 0;
        transform: translateY(50px) rotate(5deg);
    }
    to {
        opacity: 1;
        transform: translateY(0) rotate(0deg);
    }
}

@keyframes card3 {
    from {
        opacity: 0;
        transform: translateY(50px) rotate(-3deg);
    }
    to {
        opacity: 1;
        transform: translateY(0) rotate(0deg);
    }
}

@keyframes card4 {
    from {
        opacity: 0;
        transform: translateY(50px) rotate(3deg);
    }
    to {
        opacity: 1;
        transform: translateY(0) rotate(0deg);
    }
}

/* Icon Animations */
@keyframes iconBounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}

@keyframes heartbeat {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
}

@keyframes rocket {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-3px) rotate(5deg);
    }
}

@keyframes search {
    0%, 100% {
        transform: rotate(0deg);
    }
    25% {
        transform: rotate(5deg);
    }
    75% {
        transform: rotate(-5deg);
    }
}

@keyframes wiggle {
    0%, 100% {
        transform: rotate(0deg);
    }
    25% {
        transform: rotate(5deg);
    }
    75% {
        transform: rotate(-5deg);
    }
}

/* Text Animations */
@keyframes textGlow {
    0%, 100% {
        text-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
    }
    50% {
        text-shadow: 0 0 20px rgba(99, 102, 241, 0.8);
    }
}

@keyframes textSlide {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes textFade {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Particle Animations */
@keyframes particle1 {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
    }
}

@keyframes particle2 {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100px) rotate(-360deg);
        opacity: 0;
    }
}

/* Glow Animation */
@keyframes glowPulse {
    0%, 100% {
        opacity: 0.3;
        transform: scale(1);
    }
    50% {
        opacity: 0.6;
        transform: scale(1.05);
    }
}

/* Slow Animations */
@keyframes pulseSlow {
    0%, 100% {
        opacity: 0.2;
    }
    50% {
        opacity: 0.4;
    }
}

@keyframes bounceSlow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes spinSlow {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Apply Animations */
.animate-slide-down {
    animation: slideDown 1s ease-out;
}

.animate-slide-up-1 {
    animation: slideUp1 1s ease-out 0.2s both;
}

.animate-slide-up-2 {
    animation: slideUp2 1s ease-out 0.4s both;
}

.animate-slide-up-3 {
    animation: slideUp3 1s ease-out 0.6s both;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out 0.8s both;
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s ease-out 0.3s both;
}

.animate-fade-in-right-delayed {
    animation: fadeInRightDelayed 1.2s ease-out 1s both;
}

.animate-bounce-in {
    animation: bounceIn 1.2s ease-out 1.2s both;
}

.animate-rotate-in {
    animation: rotateIn 0.8s ease-out 0.1s both;
}

.animate-slide-up-button {
    animation: fadeInUp 1s ease-out 1s both;
}

/* Floating Elements */
.animate-float-1 {
    animation: float1 6s ease-in-out infinite;
}

.animate-float-2 {
    animation: float2 8s ease-in-out infinite;
}

.animate-float-3 {
    animation: float3 7s ease-in-out infinite;
}

.animate-float-4 {
    animation: float4 9s ease-in-out infinite;
}

/* Background Animations */
.animate-ken-burns {
    animation: kenBurns 20s ease-in-out infinite alternate;
}

.animate-gradient-shift {
    animation: gradientShift 10s ease-in-out infinite;
}

/* Card Animations */
.animate-card-1 {
    animation: card1 1s ease-out 1.2s both;
}

.animate-card-2 {
    animation: card2 1s ease-out 1.4s both;
}

.animate-card-3 {
    animation: card3 1s ease-out 1.6s both;
}

.animate-card-4 {
    animation: card4 1s ease-out 1.8s both;
}

/* Icon Animations */
.animate-icon-bounce {
    animation: iconBounce 2s ease-in-out infinite;
}

.animate-heartbeat {
    animation: heartbeat 1.5s ease-in-out infinite;
}

.animate-rocket {
    animation: rocket 2s ease-in-out infinite;
}

.animate-search {
    animation: search 3s ease-in-out infinite;
}

.animate-wiggle {
    animation: wiggle 4s ease-in-out infinite;
}

/* Text Animations */
.animate-text-glow {
    animation: textGlow 2s ease-in-out infinite;
}

.animate-text-slide {
    animation: textSlide 0.8s ease-out 0.2s both;
}

.animate-text-fade {
    animation: textFade 1s ease-out 0.4s both;
}

/* Slow Animations */
.animate-pulse-slow {
    animation: pulseSlow 4s ease-in-out infinite;
}

.animate-bounce-slow {
    animation: bounceSlow 6s ease-in-out infinite;
}

.animate-spin-slow {
    animation: spinSlow 20s linear infinite;
}

.animate-spin-on-load {
    animation: spinSlow 2s ease-out;
}

/* Glow Animation */
.animate-glow-pulse {
    animation: glowPulse 4s ease-in-out infinite;
}

/* Image Zoom */
.animate-image-zoom {
    transition: transform 0.5s ease;
}

.genre-card:hover .animate-image-zoom {
    transform: scale(1.1);
}

/* Particles */
.particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(99, 102, 241, 0.6);
    border-radius: 50%;
}

.particle-1 {
    left: 10%;
    animation: particle1 15s linear infinite;
    animation-delay: 0s;
}

.particle-2 {
    left: 30%;
    animation: particle2 18s linear infinite;
    animation-delay: 3s;
}

.particle-3 {
    left: 50%;
    animation: particle1 20s linear infinite;
    animation-delay: 6s;
}

.particle-4 {
    left: 70%;
    animation: particle2 16s linear infinite;
    animation-delay: 9s;
}

.particle-5 {
    left: 90%;
    animation: particle1 22s linear infinite;
    animation-delay: 12s;
}

/* Enhanced Hover Effects */
.genre-card:hover .text-content {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
}

.genre-card:hover .image-content {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.genre-card .image-content {
    transform: translateY(10px) scale(1.1);
}

.genre-card:hover {
    transform: translateY(-12px) scale(1.05) rotate(1deg);
    box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.3);
}

/* Smooth transitions */
.genre-card .text-content,
.genre-card .image-content {
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.genre-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Typing Effect */
.typing-text {
    overflow: hidden;
    border-right: 2px solid rgba(255, 255, 255, 0.75);
    white-space: nowrap;
    animation: typing 3s steps(100, end) 1s both, blink-caret 1s step-end infinite 4s;
}

@keyframes typing {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}

@keyframes blink-caret {
    from, to {
        border-color: transparent;
    }
    50% {
        border-color: rgba(255, 255, 255, 0.75);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced hover interactions
    const genreCards = document.querySelectorAll('.genre-card');
    
    genreCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            // Add ripple effect
            const ripple = document.createElement('div');
            ripple.className = 'absolute inset-0 bg-accent/10 rounded-xl animate-ping';
            this.appendChild(ripple);
            
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);
        });
        
        // Add staggered entrance animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 200);
                }
            });
        });
        
        observer.observe(card);
    });
    
    // Add parallax effect to floating elements
    window.addEventListener('mousemove', (e) => {
        const floatingElements = document.querySelectorAll('.floating-element');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        floatingElements.forEach((element, index) => {
            const speed = (index + 1) * 0.5;
            const xPos = (x - 0.5) * speed * 20;
            const yPos = (y - 0.5) * speed * 20;
            
            element.style.transform += ` translate(${xPos}px, ${yPos}px)`;
        });
    });


});
</script>
@endsection
