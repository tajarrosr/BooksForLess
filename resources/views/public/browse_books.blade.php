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

        .item-cover {
            grid-row: 1 / 4;
            grid-column: 1 / 4;
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
        <div class="cart fixed top-0 left-full w-2/5 bg-background-100 border-l-2 border-solid border-accent-700 h-dvh transition-all">
            <h1 class="uppercase text-4xl text-text-900 m-0 ml-5 pt-0 pr-5 h-20 flex items-center">Cart</h1>
            <x-cart-card/>
            <div class="check-out-container absolute bottom-0 w-full grid grid-cols-2 grid-rows-2 text-text-800">
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
        <section class="grid-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-auto">
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
        // console.log(books);

        // openCart.addEventListener('click', () => {
        //     body.classList.add("active");
        // });

        // closeCart.addEventListener('click', () => {
        //     body.classList.remove("active");
        // });

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
        listItem.classList.add('grid', 'grid-col-4', 'grid-rows-5', 'bg-accent-100', 'shadow-md', 'rounded-lg', 'p-4', 'my-2', 'gap-0', 'auto-rows-auto');
        // Set the inner HTML of the list item with book details
        listItem.innerHTML = `
            <img src="${book.book_tmb}" alt="Book Cover" class="item-cover rounded-xl mx-auto w-20">
            <span class="item-title">${book.book_title}</span>
            <span class="item-author">${book.book_author}</span>
            <span class="item-price">${book.book_price}</span>
            <span class="item-subtotal">Subtotal: ${book.book_price * book.quantity}</span>
            <span class="item-quantity">Quantity: ${book.quantity}</span>
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