@include('partials.__header')

<body class="overflow-x-hidden">
    <div class="loader util-loader-props">
        <div class="loader-imgs util-loader-imgs-container-props">
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-1.jpeg')}}" alt="showcase-photo"></div>
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-2.jpg')}}" alt="showcase-photo"></div>
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-3.jpg')}}" alt="showcase-photo"></div>
            <div class="img util-imgs-wrapper-props" id="loader-logo"><img class="util-img-props" src="{{asset('assets/images/landing-page/BOOKS4LESS-LOGO-MINIMALISTIC-TRANSPARENT.png')}}" alt="company-logo"></div>
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-4.jpg')}}" alt="showcase-photo"></div>
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-5.jpg')}}" alt="showcase-photo"></div>
            <div class="img util-imgs-wrapper-props"><img class="util-img-props" src="{{asset('assets/images/landing-page/books-for-less-6.jpg')}}" alt="showcase-photo"></div>
        </div>
    </div>

    <div class="website-content">
        <div class="main-container">
            <section class="full-screen-section">
                <!-- Left Side Books -->
                <div class="side-books left-books">
                    <div class="book-item">
                        <img src="{{asset('assets/images/landing-page/featured-book-1.avif')}}" alt="featured-book">
                    </div>
                    <div class="book-item">
                        <img src="{{asset('assets/images/landing-page/featured-book-2.jpg')}}" alt="featured-book">
                    </div>
                </div>

                <!-- Center Content -->
                <div class="center-content">
                    <div class="hero-text">
                        <h1 class="hero-title">WE SELL</h1>
                        <h1 class="hero-title">
                            <span class="highlight">PREOWNED</span> BOOKS
                        </h1>
                        <h1 class="hero-title">
                            AT AN <span class="highlight">AFFORDABLE</span> PRICE
                        </h1>
                    </div>
                    
                    <div class="cta-section">
                        <button class="shop-now-btn">
                            <a href="{{ route('show-all.books') }}">
                                <i class="fas fa-book-open"></i>
                                Shop Now!
                            </a>
                        </button>
                        <p class="cta-subtitle">Discover thousands of quality preowned books</p>
                    </div>
                </div>

                <!-- Right Side Books -->
                <div class="side-books right-books">
                    <div class="book-item">
                        <img src="{{asset('assets/images/landing-page/featured-book-3.jpg')}}" alt="featured-book">
                    </div>
                    <div class="book-item">
                        <img src="{{asset('assets/images/landing-page/featured-book-4.jpg')}}" alt="featured-book">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #1d4ed8 100%);
            color: white;
            overflow-x: hidden;
            height: 100vh;
        }

        .main-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .full-screen-section {
            height: 100vh;
            display: grid;
            grid-template-columns: 200px 1fr 200px;
            align-items: center;
            padding: 2rem;
            position: relative;
            gap: 2rem;
        }

        .full-screen-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="books" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5" width="20" height="20"/></pattern></defs><rect width="100" height="100" fill="url(%23books)"/></svg>');
            opacity: 0.3;
        }

        .side-books {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            position: relative;
            z-index: 2;
        }

        .left-books {
            justify-self: end;
        }

        .right-books {
            justify-self: start;
        }

        .side-books .book-item {
            width: 120px;
            height: 160px;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .side-books .book-item:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.4);
        }

        .side-books .book-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .side-books .book-item:hover img {
            transform: scale(1.1);
        }

        .center-content {
            text-align: center;
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-text {
            margin-bottom: 3rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
            letter-spacing: -0.02em;
        }

        .highlight {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .highlight::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            border-radius: 2px;
            opacity: 0.7;
        }

        .cta-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .shop-now-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            border-radius: 50px;
            padding: 0;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            position: relative;
            overflow: hidden;
        }

        .shop-now-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .shop-now-btn:hover::before {
            left: 100%;
        }

        .shop-now-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4);
        }

        .shop-now-btn a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 3rem;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.125rem;
            position: relative;
            z-index: 1;
        }

        .cta-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.125rem;
            font-weight: 300;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .full-screen-section {
                grid-template-columns: 150px 1fr 150px;
                gap: 1.5rem;
            }
            
            .side-books .book-item {
                width: 100px;
                height: 130px;
            }
            
            .hero-title {
                font-size: clamp(2rem, 4.5vw, 3.5rem);
            }
        }

        @media (max-width: 968px) {
            .full-screen-section {
                grid-template-columns: 120px 1fr 120px;
                gap: 1rem;
                padding: 1.5rem;
            }
            
            .side-books .book-item {
                width: 80px;
                height: 110px;
            }
            
            .side-books {
                gap: 1.5rem;
            }
            
            .hero-text {
                margin-bottom: 2rem;
            }
            
            .shop-now-btn a {
                padding: 1rem 2.5rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            .full-screen-section {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr auto;
                gap: 2rem;
                padding: 2rem 1rem;
                text-align: center;
            }
            
            .side-books {
                flex-direction: row;
                justify-content: center;
                gap: 1rem;
            }
            
            .left-books {
                order: 1;
                justify-self: center;
            }
            
            .center-content {
                order: 2;
            }
            
            .right-books {
                order: 3;
                justify-self: center;
            }
            
            .side-books .book-item {
                width: 100px;
                height: 130px;
            }
            
            .hero-title {
                font-size: clamp(1.8rem, 8vw, 2.8rem);
            }
            
            .hero-text {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 480px) {
            .full-screen-section {
                padding: 1.5rem 0.5rem;
                gap: 1.5rem;
            }
            
            .side-books .book-item {
                width: 80px;
                height: 110px;
            }
            
            .shop-now-btn a {
                padding: 0.875rem 2rem;
                font-size: 0.95rem;
            }
            
            .cta-subtitle {
                font-size: 1rem;
            }
        }

        /* Loading Animation */
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-imgs {
            display: flex;
            gap: 20px;
        }

        .img {
            width: 120px;
            height: 160px;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        .util-img-props {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Animation delays for staggered effect */
        .left-books .book-item:nth-child(1) {
            animation-delay: 0.2s;
        }
        
        .left-books .book-item:nth-child(2) {
            animation-delay: 0.4s;
        }
        
        .right-books .book-item:nth-child(1) {
            animation-delay: 0.6s;
        }
        
        .right-books .book-item:nth-child(2) {
            animation-delay: 0.8s;
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            gsap.set(".img", {y: 500});
            gsap.set(".loader-imgs", {x: 500});
            gsap.set("h1, .cta-section, .book-item", {y: 200, opacity: 0});

            const tl = gsap.timeline({
                delay: 1
            });

            tl.to(".img", {
                y: 0,
                duration: 1.5,
                stagger: 0.05,
                ease: "power3.inOut",
            }).to(".loader-imgs", {
                x: 0,
                duration: 3,
                ease: "power3.inOut",
            }, "-=2.5")

            .to(".img:not(#loader-logo)", {
                clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                duration: 1,
                stagger: 0.1,
                ease: "power3.inOut",
            }, "-=1")

            .to(".loader", {
                clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                duration: 1,
                ease: "power3.inOut",
            }, "-=0.5")
            
            .to("h1", {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.2,
                ease: "power3.inOut",
            })
            
            .to(".cta-section", {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: "power3.inOut",
            }, "-=0.5")
            
            .to(".book-item", {
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.1,
                ease: "power3.inOut",
            }, "-=0.8");
        });

        // Load cart from localStorage on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedCart = localStorage.getItem('cart');
            if (savedCart) {
                listCard = JSON.parse(savedCart);
                reloadCart();
                updateCartItemCount();
            }
        });
    </script>
</body>

@include('partials.__footer')
