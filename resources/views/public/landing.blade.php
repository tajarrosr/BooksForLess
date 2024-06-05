@include('partials.__header')
    <header>
    
    </header>    

    <main class="container">
        <div class="loader">
            <div class="loader-images">
                <div class="img"><img src="{{asset('assets/images/landing-page/books-for-less-1.jpeg')}}" alt="showcase-photo"></div>
                <div class="img"><img src="{{asset('assets/images/landing-page/books-for-less-2.jpeg')}}" alt="showcase-photo"></div>
                <div class="img" ><img src={{asset('assets/images/landing-page/books-for-less-3.jpg')}} alt="showcase-photo"></div>
                <div class="img" id="loader-logo"><img src={{asset('assets/images/landing-page/BOOKS4LESS-LOGO-MINIMALISTIC-TRANSPARENT.png')}} alt="company-logo"></div>
                <div class="img"><img src={{asset('assets/images/landing-page/books-for-less-4.jpg')}} alt="showcase-photo"></div>
                <div class="img"><img src={{asset('assets/images/landing-page/books-for-less-5.jpg')}} alt="showcase-photo"></div>
                <div class="img"><img src={{asset('assets/images/landing-page/books-for-less-6.jpg')}} alt="showcase-photo"></div>
            </div>
        </div>
            
            <div class="website-content">
                
            </div>
        </div>
    </main>

    <footer>

    </footer>
@include('partials.__footer')