@include('partials.__header')
    <main class="grid-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 auto-rows-auto">
        @foreach ($books as $book)
        <div class="bg-white shadow-md rounded-lg p-4">
            <img src="{{$book->book_tmb}}" alt="Book Cover" class="mx-auto">
            <h3 class="text-lg font-semibold mt-2">{{$book->book_name}}</h3>
            <p class="text-gray-600">{{$book->book_author}}</p>
            <p class="text-gray-600">{{$book->book_price}}</p>
            <button class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600"><a href="#">Add to Cart</a></button>
        </div>
        @endforeach
    </main>
@include('partials.__footer')