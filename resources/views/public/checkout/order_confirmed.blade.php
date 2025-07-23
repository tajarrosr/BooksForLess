@extends('layouts.app')

@section('title', 'Order Confirmed - BooksForLess')

@section('content')
<div class="min-h-screen bg-base-200 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow-2xl">
                <div class="card-body text-center py-16">
                    <div class="mb-8">
                        <div class="w-24 h-24 bg-success/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-check-circle text-5xl text-success"></i>
                        </div>
                        <h1 class="text-4xl font-bold text-success mb-4">Order Confirmed!</h1>
                        <p class="text-xl text-base-content/70 mb-8">
                            Thank you for your purchase. Your order has been successfully placed.
                        </p>
                    </div>
                    
                    <div class="alert alert-info mb-8">
                        <i class="fas fa-info-circle text-2xl"></i>
                        <div class="text-left">
                            <h3 class="font-bold text-lg mb-2">What's Next?</h3>
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-center">
                                    <i class="fas fa-envelope w-4 mr-2"></i>
                                    You'll receive an order confirmation email shortly
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-shipping-fast w-4 mr-2"></i>
                                    We'll process and ship your order within 1-2 business days
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-truck w-4 mr-2"></i>
                                    You'll receive tracking information once your order ships
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('show-all.books') }}" class="btn btn-primary btn-lg btn-gradient">
                            <i class="fas fa-book"></i>
                            Continue Shopping
                        </a>
                        <a href="{{ route('landing') }}" class="btn btn-outline btn-lg">
                            <i class="fas fa-home"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    localStorage.removeItem('cart');
    sessionStorage.removeItem('cart_data');
    
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        cartCount.textContent = '0';
    }
</script>
@endpush
