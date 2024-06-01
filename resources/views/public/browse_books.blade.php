@include('partials.__header')

    <style>
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
    </style>

<body class="bg-background-50">
    
    {{-- * NAVIGATION BAR --}}
        <div class="navbar bg-background-200">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl text-secondary-950">BooksForLess</a>
    </div>
    <div class="flex-none">
        <x-dark-toggle/>
        <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
            <div class="indicator">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-950"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>          
            <span class="badge badge-sm indicator-item bg-badge-800 text-text-50 dark:text-text-950">0</span>
            </div>
        </div>
        <div tabindex="0" class="mt-3 z-[1] text-text-500 card card-compact dropdown-content w-52 bg-base-100 shadow">
            <div class="card-body">
            <span class="font-bold text-lg">8 Items</span>
            <span class="text-info">Subtotal: $999</span>
            <div class="card-actions">
                <button class="btn btn-primary btn-block">View cart</button>
            </div>
            </div>
        </div>
        </div>
        <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
            </div>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <li>
            <a class="justify-between">
                Profile
                <span class="badge bg-badge-800 text-text-50 dark:text-text-950">New</span>
            </a>
            </li>
            <li><a>Settings</a></li>
            <li><a>Logout</a></li>
        </ul>
        </div>
    </div>
    </div>

    {{-- <x-nav/> --}}

    {{-- * WEBPAGE TITLE --}}
    <header class="page-title text-center">
        <h1 class="uppercase text-4xl text-text-700 py-12">browse books</h1>
    </header>

        
    {{-- * ADD TO CART SLIDER (LEFT) --}}
    <div class="cart fixed top-0 left-full w-2/5 bg-background-900 border-l-2 border-solid border-accent-700 h-dvh transition-all">
        <h1 class="uppercase text-4xl text-text-900 m-0 pt-0 pr-5 h-20 flex items-center">Cart</h1>
        <ul class="list-cart"></ul>
        <div class="check-out absolute bottom-0 w-full grid grid-cols-2">
            <div class="total">0</div>
            <div class="close-cart">close</div>
            {{-- cursor-pointer text-text-50 bg-primary-900 w-full h-16 flex items-center justify-center font-bold even:bg-gray-100 --}}
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
                <button class="bg-primary-500 text-text-50 px-4 py-2 mt-4 rounded hover:bg-primary-800"><a href="#">Add to Cart</a></button>
            </div>
            @endforeach
        </section>
</body>
    

    <script>
        const openCart = document.querySelector(".open-cart");
        const closeCart = document.querySelector(".close-cart");
        const checkOut = document.querySelector(".check-out");
        const total = document.querySelector(".total");
        const listCart = document.querySelector(".list-cart");
        const body = document.querySelector("body");

        const books = @json($books);

        // * passes the retrieved data from local_db to client-side (js)

    document.addEventListener('DOMContentLoaded', function() {
        const books = @json($books);

        if (Array.isArray(books)) {
            // Transform the books array into the desired format
            let booksArr = books.map(book => ({
                id: book.id,
                bookTitle: book.book_title,
                bookThumbnail: book.book_tmb,
                bookPrice: book.book_price,
                bookISBN: book.book_isbn,
                bookStock: book.book_stock,
                bookDescription: book.book_desc,
                bookAuthor: book.book_author,
                bookGenres: book.book_genres,
                // * fields of each individual book
            }));

            // Log the transformed booksArr array
            console.log('Books Array:', booksArr);

        } else {
            console.error('Books is not an array:', books);
        }
    }); // end of DOMContentLoaded listener

        openCart.addEventListener('click', () => {
            body.classList.add("active");
        });

        closeCart.addEventListener('click', () => {
            body.classList.remove("active");
        });


        let listCard = [];
        const addToBag = (key) => {
            if (listCard[key] == null) {
                listCard[key] = JSON.parse(JSON.stringify(booksArr[key]));
                listCard[key].quantity = 1;
            }
            reloadCard();
        }

        const reloadCard = () => {
            listCard.innerHTML = "";
            let count = 0;
            let totalPrice = 0;

            listCard.forEach((value, key) => {
                totalPrice = totalPrice 
            })
        }
    </script>

@include('partials.__footer')