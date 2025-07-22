@include('partials.__header')

    <style scoped>

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

<body class="bg-gray-50 min-h-screen">
    <x-nav/>
    
    <header class="shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-4xl font-bold text-gray-900 text-center">Discover Amazing Books</h1>
            <p class="text-gray-600 text-center mt-2">Find your next favorite read from our curated collection</p>
        </div>
    </header>

    <x-cart-slider/>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach ($books as $book)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                <div class="aspect-w-3 aspect-h-4 bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                         alt="{{ $book->book_title }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 text-lg mb-1 line-clamp-2">{{ $book->book_title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">by {{ $book->book_author }}</p>
                    
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-2xl font-bold text-green-600">₱{{ number_format($book->book_price, 2) }}</span>
                        <span class="text-sm text-green-700 bg-green-100 px-2 py-1 rounded-full">
                            {{ $book->book_stock }} in stock
                        </span>
                    </div>
                    
                    <button onclick="addToCart({{$book}})" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Add to Cart
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        <x-scroll-to-top/>
    </main>
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
        localStorage.setItem('cart', JSON.stringify(listCard));
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
</script>

@include('partials.__footer')
