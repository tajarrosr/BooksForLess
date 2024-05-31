@include('partials.__header')
    <x-nav/>

    <main class="container w-full transition duration-500 ease-in-out m-auto">
        <header>
            <h1 class="uppercase text-4xl text-primary-300">browse books</h1>
            
            <div class="shopping">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>
                <span class="quantity">0</span>
            </div>
        </header>

        <div class="bookshelf-list"></div>

        <div class="card">
            <h1 class="uppercase text-4xl text-primary-300">Card</h1>
            <ul class="list-card"></ul>
            <div class="check-out">
                <div class="total">0</div>
                <div class="close-shopping">close</div>
            </div>
        </div>

        <section class="grid-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-auto">
            @foreach ($books as $book)
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="{{$book->book_tmb}}" alt="Book Cover" class="mx-auto">
                <h3 class="text-lg font-semibold mt-2">{{$book->book_title}}</h3>
                <p class="text-gray-600">{{$book->book_author}}</p>
                <p class="text-gray-600">{{$book->book_price}}</p>
                <p class="text-rose-600 font-bold">In Stock: {{$book->book_stock}}</p>
                <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600"><a href="#">Add to Cart</a></button>
            </div>
            @endforeach
        </section>
    </main>

@include('partials.__footer')