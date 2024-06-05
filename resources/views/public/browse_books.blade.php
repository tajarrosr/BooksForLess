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

<body class="bg-background-50 transition-all duration-300">
    
    {{-- * NAVIGATION BAR --}}
    <x-nav/>

    {{-- * WEBPAGE TITLE --}}
    <header class="page-title text-center font-butler-stencil">
        <h1 class="uppercase text-5xl text-text-700 py-12">browse books</h1>
    </header>

        
    {{-- * ADD TO CART SLIDER (LEFT) --}}
    <x-cart-slider/>

        {{-- * PRODUCTS IN A GRID --}}
    <section class="grid-container grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-auto">
        @foreach ($books as $book)
        <div class="bg-accent-100 shadow-md rounded-lg p-4 flex flex-col justify-between"> <!-- Added flex utilities -->
            <div> <!-- Wrapping content to allow vertical alignment -->
                <img src="{{$book->book_tmb}}" alt="Book Cover" class="rounded-xl mx-auto">
                <h3 class="text-lg font-semibold mt-2 text-text-950">{{$book->book_title}}</h3>
                <p class="text-secondary-600">{{$book->book_author}}</p>
                <p class="text-secondary-600">₱{{$book->book_price}}</p>
                <p class="text-success-700 font-bold">In Stock: {{$book->book_stock}}</p>
            </div>
            <button onclick="addToCart({{$book}})" class="bg-primary-500 text-text-900 dark:text-text-50 px-4 py-2 rounded hover:bg-primary-300 font-iphone font-semibold hover:font-serif mt-4">Add to Cart</button>
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

        const roundUp = (num) => {
            return Math.round((num + Number.EPSILON) * 100) / 100
        }

        let listCard = [];
        const addToCart = (book) => {
            // Check if the book already exists in the cart
            const existingBookIndex = listCard.findIndex(item => item.book_title === book.book_title);

            if (existingBookIndex !== -1) {
                // If the book already exists, increase its quantity
                if (listCard[existingBookIndex].quantity < book.book_stock) {
                    listCard[existingBookIndex].quantity++;
                } else {
                    // state: quantity added > in stock books
                    alert("You can't add more of this book. Limited stock available.")
                }

            } else {
                // If the book does not exist, add it to the cart
                listCard.push({
                    ...book,
                    quantity: 1
                });
            }

            // Reload the cart display
            reloadCart();

            // Update the cart item count (badge)
            updateCartItemCount();
        } // end of addToCart()


const reloadCart = () => {
    // Clear previous contents of the cart
    listCart.innerHTML = "";
    
    let total = 0;
    let subtotalForEachBook = {}; // Object to store subtotal for each book

    // Create a new unordered list element
    const cartList = document.createElement('ul');

    
    // Iterate over the listCard array
    listCard.forEach(book => {
        // Create a new list item element
        const listItem = document.createElement('li');
        listItem.classList.add('grid', 'grid-cols-4', 'bg-accent-100', 'shadow-md', 'rounded-lg', 'p-2', 'w-11/12', 'mb-2', 'mx-auto', 'text-text-950', 'gap-1');
        // Set the inner HTML of the list item with book details
        listItem.innerHTML = `
            <img src="${book.book_tmb}" alt="Book Cover" class="item-cover rounded-xl w-auto col-start-1 col-end-2 row-span-5">

            <span class="item-title text-xl font-bold col-start-2 col-end-5 row-span-2 font-merriweather">${book.book_title}</span>

            <span class="item-author text-md col-start-2 col-end-5 row-span-1">Author: ${book.book_author}</span>

            <span class="item-price text-md col-start-2 col-end-5 row-span-1">Unit Price: ${book.book_price}</span>

            <div class="relative col-start-2 col-end-5">
            
                <span class="item-subtotal relative text-md col-start-2 col-end-5 ">Subtotal: ${book.book_price * book.quantity}</span>
        
                <span class="item-quantity text-text-900 dark:text-text-950 text-3xl p-2 col-start-4 absolute col-end-5 right-1 bottom-0 font-merriweather">×${book.quantity}
                </span>
            
            </div>

           
            <strong class="bg-badge-800 text-text-50 text-2xl font-bold dark:text-text-50 px-4 py-2 rounded hover:bg-primary-300  col-start-1 col-end-6 justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-50"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></strong>

            <button onclick="updateQuantity(${book.book_title})" class="bg-success-700 text-text-50 text-2xl font-bold dark:text-text-50 px-4 py-2 rounded hover:bg-primary-300 col-start-5 row-start-1 row-span-3 w-full h-full">+</button>

            <button onclick="removeFromCart(${book.book_title})" class="bg-error-700 text-text-50 text-2xl font-bold  dark:text-text-50 px-4 py-4 rounded hover:bg-primary-300 col-start-5 col-end-6 row-start-4 row-span-2 w-full h-full">-</button>


        `;
        // Append the list item to the unordered list
        cartList.appendChild(listItem);
        
        // Calculate subtotal for each book
        const subtotal = book.book_price * book.quantity;
        
        // Add the subtotal to the subtotalForEachBook object
        if (subtotalForEachBook.hasOwnProperty(book.book_title)) {
            subtotalForEachBook[book.book_title] += subtotal;
        } else {
            subtotalForEachBook[book.book_title] = subtotal;
        }
    });

    // Sum up the subtotal for each book to calculate the total
    total = Object.values(subtotalForEachBook).reduce((acc, curr) => acc + curr, 0);

    // Round up the total to the nearest two decimal places.
    total = roundUp(total);

    stringTotal = "₱" + String(total);

    // Append the results to the div.total element
    cartTotal.innerHTML = stringTotal;

    // Append the unordered list to the listCart element
    listCart.appendChild(cartList);

    // Print total for debug
    // console.log(total);
};

        // function responsible for getting the subtotal items in the cart.
        const getTotalItemsInCart = () => {
            let totalItems = 0;

            listCard.forEach(book => {
                totalItems += book.quantity;
            });

            return totalItems;
        };

        const updateCartItemCount = () => {
            const cartItemCountElement = document.getElementById('cart-item-count');
            const totalItemsInCart = getTotalItemsInCart(); // Assuming you have a function getTotalItemsInCart that returns the subtotal items in the cart

            cartItemCountElement.innerText = totalItemsInCart;

            // console.log(totalItemsInCart);
        };

        const toggleCartDrawer = () => {
            const cartContainer = document.querySelector('.cart-container');
            const mainContent = document.querySelector('.main-content');
            const navbar = document.querySelector('.navbar');

            // Toggle 'active' class on the body to open or close the cart drawer
            document.body.classList.toggle('active');

            // Adjust the width and margin of the main content area and navbar based on the state of the cart drawer
            if (document.body.classList.contains('active')) {
                mainContent.classList.add('md:mr-1/3'); // Reduce the width of the main content area on medium screens and above
                mainContent.classList.add('-ml-1/3'); // Adjust the left margin of the main content area
                navbar.classList.add('md:mr-1/3'); // Reduce the width of the navbar on medium screens and above
                navbar.classList.add('-ml-1/3'); // Adjust the left margin of the navbar
            } else {
                mainContent.classList.remove('md:mr-1/3'); // Reset the width of the main content area
                mainContent.classList.remove('-ml-1/3'); // Reset the left margin of the main content area
                navbar.classList.remove('md:mr-1/3'); // Reset the width of the navbar
                navbar.classList.remove('-ml-1/3'); // Reset the left margin of the navbar
            }
        };
    </script>

@include('partials.__footer')