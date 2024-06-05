@include('partials.__header')

    <style>

        .cart-container {
            @apply fixed top-0 right-0 h-full bg-white transition-all duration-300 z-50;
            width: 30%; /* Set the width of the drawer */
        }

        /* CSS for the navbar */
        .navbar {
            @apply transition-margin-left duration-300;
        }

        /* CSS for the main content area */
        .main-content {
            @apply transition-margin-right duration-300;
        }
        .active .cart {
            left: calc(100% - 40%);
        }

        .active .container {
            transform: translateX(-200px);
            -webkit-transform: translateX(-200px);
            -moz-transform: translateX(-200px);
            -ms-transform: translateX(-200px);
            -o-transform: translateX(-200px);
        }

        .cart .check-out div{
            background-color: var(rgb(--background-700));
            color: var(rgb(--text-50));
            width: 100%;
            height: 70px;
            display: flex; 
            justify-content: center;
            align-items: center;
            font-weight: bold;
            cursor: pointer;
        }

        .item-1 {
            grid-row: 1 / 2;
            grid-column: 1 / 2;
        }
    </style>

<body class="bg-background-50">
    
    {{-- * NAVIGATION BAR --}}
    <x-nav/>

    {{-- * WEBPAGE TITLE --}}
    <header class="page-title text-center">
        <h1 class="uppercase text-4xl text-text-700 py-12">browse books</h1>
    </header>

        
    {{-- * ADD TO CART SLIDER (LEFT) --}}
    <div class="cart-container">
        <div class="cart fixed top-0 left-full w-2/5 bg-background-100 border-l-2 border-solid border-accent-500 h-dvh transition-all shadow-2xl">
            <h1 class="uppercase text-4xl text-text-900 m-0 ml-5 pt-0 pr-5 h-20 flex items-center">Bag</h1>

            {{-- * FRAGMENTS --}}
            <x-cart-card/>


            <div class="check-out-container border-solid border-t-2 border-accent-500 absolute bottom-0 w-full grid grid-cols-2 grid-rows-2 text-text-800 shadow-inner">
                <div class="total-label text-center capitalize item-1">Total:</div>
                <div class="total item-2 text-center">₱0</div>
                <div class="close-cart item-3 uppercase text-center cursor-pointer" onclick="toggleCartDrawer()">close</div>
                <div class="check-out-button item-4 uppercase text-center">
                    <button onclick="" class="uppercase">checkout</button></div>
                {{-- cursor-pointer text-text-50 bg-primary-900 w-full h-16 flex items-center justify-center font-bold even:bg-gray-100 --}}
            </div>
        </div>
    </div>

        {{-- * PRODUCTS IN A GRID --}}
        <section class="grid-container grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-auto">
            @foreach ($books as $book)
            <div class="bg-accent-100 shadow-md rounded-lg p-4">
                <img src="{{$book->book_tmb}}" alt="Book Cover" class="rounded-xl mx-auto">
                <h3 class="text-lg font-semibold mt-2 text-text-950">{{$book->book_title}}</h3>
                <p class="text-secondary-600">{{$book->book_author}}</p>
                <p class="text-secondary-600">{{$book->book_price}}</p>
                <p class="text-success-700 font-bold">In Stock: {{$book->book_stock}}</p>
                <button onclick="addToCart({{$book}})" class="bg-primary-500 text-text-900 dark:text-text-50 px-4 py-2 mt-4 rounded hover:bg-primary-300">Add to Cart</button>
            </div>
            @endforeach
            <x-scroll-to-top/>
        </section>

        
</body>
    

<script>
    const openCart = document.querySelector(".open-cart");
    const closeCart = document.querySelector(".close-cart");
    const checkOut = document.querySelector(".check-out");
    const cartTotal = document.querySelector(".total");
    const listCart = document.querySelector(".list-cart");
    const body = document.querySelector("body");

    // * passes the retrieved data from local_db to client-side (js)
    const books = @json($books);

    // Function to round up numbers to 2 decimal places
    const roundUp = (num) => {
        return Math.round((num + Number.EPSILON) * 100) / 100;
    }

    let listCard = [];

    // Function to add a book to the cart
    const addToCart = (book) => {
        const existingBookIndex = listCard.findIndex(item => item.book_title === book.book_title);

        if (existingBookIndex !== -1) {
            if (listCard[existingBookIndex].quantity < book.book_stock) {
                listCard[existingBookIndex].quantity++;
            } else {
                alert("You can't add more of this book. Limited stock available.");
            }
        } else {
            listCard.push({
                ...book,
                quantity: 1
            });
        }

        reloadCart();
        updateCartItemCount();
    }

    // Function to remove all instances of a book from the cart
    const removeAll = (bookTitle) => {
        listCard = listCard.filter(book => book.book_title !== bookTitle);
        reloadCart();
        updateCartItemCount();
    }

    // Function to update the quantity of a book in the cart
    const updateQuantity = (bookTitle) => {
        const bookIndex = listCard.findIndex(item => item.book_title === bookTitle);

        if (bookIndex !== -1) {
            if (listCard[bookIndex].quantity < listCard[bookIndex].book_stock) {
                listCard[bookIndex].quantity++;
            } else {
                alert("You can't add more of this book. Limited stock available.");
            }
        }

        reloadCart();
        updateCartItemCount();
    }

    // Function to remove one instance of a book from the cart
    const removeOneFromCart = (bookTitle) => {
        const bookIndex = listCard.findIndex(item => item.book_title === bookTitle);

        if (bookIndex !== -1) {
            if (listCard[bookIndex].quantity > 1) {
                listCard[bookIndex].quantity--;
            } else {
                listCard = listCard.filter(book => book.book_title !== bookTitle);
            }
        }

        reloadCart();
        updateCartItemCount();
    }

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
                <img src="${book.book_tmb}" alt="Book Cover" class="item-cover rounded-xl w-auto col-start-1 col-end-2 row-span-5">
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
</script>

@include('partials.__footer')