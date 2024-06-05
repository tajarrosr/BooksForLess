@include('partials.__header')

    <body>
        <div class="container font-butler">
            <div class="loader util-loader-props">
                <div class="loader-imgs util-loader-imgs-container-props">
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-1.jpeg')}} alt="showcase-photo"></div>
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-2.jpg')}} alt="showcase-photo"></div>
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-3.jpg')}} alt="showcase-photo"></div>
                    <div class="img util-imgs-wrapper-props" id="loader-logo"><img class="util-img-props" src={{asset('assets/images/landing-page/BOOKS4LESS-LOGO-MINIMALISTIC-TRANSPARENT.png')}} alt="company-logo"></div>
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-4.jpg')}} alt="showcase-photo"></div>
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-5.jpg')}} alt="showcase-photo"></div>
                    <div class="img util-imgs-wrapper-props"><img class="util-img-props" src={{asset('assets/images/landing-page/books-for-less-6.jpg')}} alt="showcase-photo"></div>
                </div>

            </div>

            <div class="website-content">

                {{-- * NAVBAR --}}
                <x-nav/>

                <div class="util-hero-props text-text-950">

                    <div class="util-h1-wrapper-props">
                        <h1 class="util-h1-wrapper-props">we sell</h1>
                    </div>

                    <div class="util-h1-wrapper-props">
                        <h1 class="util-h1-wrapper-props"><span class="util-emphasis-props">preowned</span> books at an</h1>
                    </div>

                    <div class="util-h1-wrapper-props">
                        <h1 class="util-h1-wrapper-props"><span class="util-emphasis-props">affordable</span> price</h1>
                    </div>
                </div>

                <x-footer/>

            </div>
        </div>  <!--* END OF CONTAINER DIV -->
    {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                gsap.set(".img", {y: 500});
                gsap.set(".loader-imgs", {x: 500});
                gsap.set(".nav-item", {y: 25, opacity: 0});
                gsap.set("h1, .item, footer", {y: 200});

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
                }, 
                "-=2.5")

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
            
            .to(".nav-item, h1, footer, .item", {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.1,
                ease: "power3.inOut",
            })
        });
    </script> --}}
    </body>

@include('partials.__footer')