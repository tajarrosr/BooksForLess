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

        <div class="container font-butler">
            <div class="util-hero-props text-text-950">
                <div class="util-h1-wrapper-props shadow-4xl">
                    <h1 class="util-h1-wrapper-props dark:text-text-800">we sell</h1>
                </div>

                <div class="util-h1-wrapper-props shadow-4xl">
                    <h1 class="util-h1-wrapper-props"><span class="util-emphasis-props shadow-inner text-primary-500 hover:text-primary-950 bg-accent-600">preowned</span> books at an</h1>
                </div>

                <div class="util-h1-wrapper-props shadow-4xl">
                    <h1 class="util-h1-wrapper-props "><span class="util-emphasis-props shadow-inner text-primary-500 hover:text-primary-950 bg-accent-600">affordable</span> price</h1>
                </div>

                <div class="util-h1-wrapper-props flex justify-center">
                    <button class="w-full sm:w-3/12 font-iphone hover:font-bold border border-solid border-accent-900 rounded-2xl px-4 py-2 bg-primary-500 hover:shadow-2xl hover:bg-primary-400 text-text-900">
                        <a href="{{ route('show-all.books') }}">Shop Now!</a>
                    </button>
                </div>
            </div>

            <x-footer/>
        </div>
    </div>  <!--* END OF WEBSITE CONTENT DIV -->
    
    {{-- Add cart slider for consistency --}}
    <x-cart-slider/>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hide navbar initially
        const navbar = document.getElementById('navbar');
        
        gsap.set(".img", {y: 500});
        gsap.set(".loader-imgs", {x: 500});
        gsap.set(".nav-item", {y: 25, opacity: 0});
        gsap.set("h1, .item, footer, button", {y: 200});

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
    
    .to("h1, footer, .item, button", {
        y: 0,
        opacity: 1,
        duration: 1,
        stagger: 0.1,
        ease: "power3.inOut",
    })
    
    // Show navbar after all animations complete
    .to(navbar, {
        opacity: 1,
        visibility: "visible",
        duration: 0.5,
        ease: "power3.inOut",
    })
    
    // Then animate nav items
    .to(".nav-item", {
        y: 0,
        opacity: 1,
        duration: 1,
        stagger: 0.1,
        ease: "power3.inOut",
    }, "-=0.3");
});

// Cart functionality - same as browse_books
const openCart = document.querySelector(".open-cart");
const closeCart = document.querySelector(".close-cart");
const checkOut = document.querySelector(".check-out");
const cartTotal = document.querySelector(".total");
const listCart = document.querySelector(".list-cart");
const body = document.querySelector("body");

// Function to round up numbers to 2 decimal places
const roundUp = (num) => {
    return Math.round((num + Number.EPSILON) * 100) / 100;
}

let listCard = [];

// Function to reload the cart display
const reloadCart = () => {
    listCart.innerHTML = "";
    let total = 0;
    let subtotalForEachBook = {};

    const cartList = document.createElement('ul');

    listCard.forEach(book => {
        const listItem = document.createElement('li');
        listItem.classList.add('grid', 'grid-cols-4', 'bg-accent-100', 'shadow-md', 'rounded-lg', 'p-2', 'w-11/12', 'mb-2', 'mx-auto', 'text-text-950', 'gap-1');

        listItem.innerHTML = `
        <img src="{{ asset('storage') }}/${book.book_tmb}" alt="Book Cover" class="item-cover rounded-xl col-span-1 w-full h-auto">
            <span class="item-title font-bold col-start-2 col-end-5 row-span-2">${book.book_title}</span>
            <span class="item-author text-sm col-start-2 col-end-5 row-span-1">Author: ${book.book_author}</span>
            <span class="item-price text-sm col-start-2 col-end-5 row-span-1">Unit Price: ${book.book_price}</span>
            <div class="relative col-start-2 col-end-5">
                <span class="item-subtotal relative text-sm col-start-2 col-end-5">Subtotal: ${book.book_price * book.quantity}</span>
                <span class="item-quantity text-text-900 dark:text-text-950 text-3xl p-2 col-start-4 absolute col-end-5 right-1 bottom-0">×${book.quantity}</span>
            </div>
            <strong class="bg-badge-800 text-text-50 text-2xl font-bold dark:text-text-50 px-4 py-2 rounded hover:bg-primary-300 col-start-1 col-end-6 justify-center items-center" onclick="removeAll('${book.book_title}')">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-50"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
            </strong>
            <button onclick="updateQuantity('${book.book_title}')" class="bg-success-700 text-text-50 text-2xl font-bold dark:text-text-50 px-4 py-2 rounded hover:bg-primary-300 col-start-5 row-start-1 row-span-3 w-full h-full">+</button>
            <button onclick="removeOneFromCart('${book.book_title}')" class="bg-error-700 text-text-50 text-2xl font-bold dark:text-text-50 px-4 py-4 rounded hover:bg-primary-300 col-start-5 col-end-6 row-start-4 row-span-2 w-full h-full">-</button>
        `;
        cartList.appendChild(listItem);

        const subtotal = book.book_price * book.quantity;

        if (subtotalForEachBook.hasOwnProperty(book.book_title)) {
            subtotalForEachBook[book.book_title] += subtotal;
        } else {
            subtotalForEachBook[book.book_title] = subtotal;
        }
    });

    total = Object.values(subtotalForEachBook).reduce((acc, curr) => acc + curr, 0);
    total = roundUp(total);
    const stringTotal = "₱" + String(total);

    cartTotal.innerHTML = stringTotal;
    listCart.appendChild(cartList);
};

const getTotalItemsInCart = () => {
    let totalItems = 0;
    listCard.forEach(book => {
        totalItems += book.quantity;
    });
    return totalItems;
};

const updateCartItemCount = () => {
    const cartItemCountElement = document.getElementById('cart-item-count');
    const totalItemsInCart = getTotalItemsInCart();
    cartItemCountElement.innerText = totalItemsInCart;
};

const toggleCartDrawer = () => {
    const cartContainer = document.querySelector('.cart-container');
    const mainContent = document.querySelector('.main-content');
    const navbar = document.querySelector('.navbar');

    document.body.classList.toggle('active');

    if (document.body.classList.contains('active')) {
        mainContent.classList.add('md:mr-1/3');
        mainContent.classList.add('-ml-1/3');
        navbar.classList.add('md:mr-1/3');
        navbar.classList.add('-ml-1/3');
    } else {
        mainContent.classList.remove('md:mr-1/3');
        mainContent.classList.remove('-ml-1/3');
        navbar.classList.remove('md:mr-1/3');
        navbar.classList.remove('-ml-1/3');
    }
};

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
