@extends('layouts.app')

@section('title', $book->book_title . ' - BooksForLess')

@section('content')
<div class="container mx-auto px-4 py-8 sm:py-12">
    <div class="max-w-6xl mx-auto bg-base-100 shadow-xl rounded-lg p-6 md:p-8 lg:p-10">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            <!-- Book Image -->
            <div class="lg:w-1/3 flex-shrink-0">
                <img src="{{ asset('storage/' . $book->book_tmb) }}" 
                     alt="{{ $book->book_title }}"
                     class="w-full h-auto object-cover rounded-lg shadow-lg"
                     onerror="this.src='https://via.placeholder.com/400x600/F8FAFC/94A3B8?text=No+Image'" />
            </div>

            <!-- Book Details -->
            <div class="lg:w-2/3 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-neutral mb-2">{{ $book->book_title }}</h1>
                    <p class="text-xl text-secondary mb-4">by {{ $book->book_author }}</p>

                    <!-- Genres -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($book->book_genres as $genre)
                            <span class="badge badge-lg badge-outline badge-primary text-sm">{{ $genre }}</span>
                        @endforeach
                    </div>

                    <!-- Description -->
                    <h3 class="text-lg font-semibold text-neutral mb-2">Description</h3>
                    <p class="text-base text-text leading-relaxed mb-6">{{ $book->book_desc }}</p>

                    <!-- Additional Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <span class="font-semibold text-neutral">ISBN:</span>
                            <span class="text-text">{{ $book->book_isbn }}</span>
                        </div>
                        <div>
                            <span class="font-semibold text-neutral">Stock:</span>
                            @if($book->book_stock <= 5 && $book->book_stock > 0)
                                <span class="badge badge-warning text-xs font-bold ml-2">Low Stock ({{ $book->book_stock }})</span>
                            @elseif($book->book_stock <= 0)
                                <span class="badge badge-error text-xs font-bold ml-2">Sold Out</span>
                            @else
                                <span class="badge badge-success text-xs font-bold ml-2">{{ $book->book_stock }} In Stock</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Price and Actions -->
                <div class="border-t border-base-200 pt-6 mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-4xl font-bold text-primary">₱{{ number_format($book->book_price, 2) }}</div>
                    <div class="flex gap-3">
                        <button class="btn btn-primary btn-lg" 
                                onclick="checkAuthAndAddToCart({{ $book->id }}, '{{ addslashes($book->book_title) }}', {{ $book->book_price }}, '{{ asset('storage/' . $book->book_tmb) }}', {{ $book->book_stock }})"
                                {{ $book->book_stock <= 0 ? 'disabled' : '' }}>
                            <i class="fas fa-cart-plus mr-2"></i>
                            {{ $book->book_stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                        </button>
                        <a href="{{ route('show-all.books') }}" class="btn btn-outline btn-lg">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Browse
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Authentication Required Modal -->
<dialog id="auth_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box text-center bg-base-100 shadow-2xl rounded-lg p-8">
        <h3 class="font-bold text-2xl text-neutral mb-4">Login or Register to Add to Cart</h3>
        <p class="py-4 text-base-content/70">You need to be logged in to add items to your shopping cart. Please log in or create an account to continue.</p>
        <div class="modal-action flex flex-col sm:flex-row justify-center gap-4 mt-6">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg flex-1 sm:flex-none">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-outline btn-lg flex-1 sm:flex-none">
                <i class="fas fa-user-plus mr-2"></i>Register
            </a>
            <form method="dialog" class="flex-1 sm:flex-none">
                <button class="btn btn-ghost btn-lg w-full">Cancel</button>
            </form>
        </div>
    </div>
</dialog>
@endsection

@push('scripts')
<script>
    function checkAuthAndAddToCart(bookId, title, price, image, stock) {
        if (window.isAuthenticated) {
            // User is logged in, proceed to add to cart
            addToCart(bookId, title, price, image, stock);
        } else {
            // User is not logged in, show the modal
            document.getElementById('auth_modal').showModal();
        }
    }
</script>
@endpush
