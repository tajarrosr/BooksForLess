@extends('layouts.app')

@section('title', 'Checkout - BooksForLess')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gradient mb-2">Checkout</h1>
            <p class="text-base-content/70">Complete your order</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Checkout Form -->
            <div class="lg:col-span-2">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body p-8">
                        <form method="POST" action="{{ route('checkout.process') }}" class="space-y-6">
                            @csrf
                            
                            <!-- Billing Information -->
                            <div>
                                <h3 class="text-xl font-bold mb-4 flex items-center">
                                    <i class="fas fa-user mr-2 text-primary"></i>
                                    Billing Information
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Full Name</span>
                                        </label>
                                        <input type="text" name="name" value="{{ old('name') }}" 
                                               class="input input-bordered @error('name') input-error @enderror" required>
                                        @error('name')
                                            <label class="label">
                                                <span class="label-text-alt text-error">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">Email</span>
                                        </label>
                                        <input type="email" name="email" value="{{ old('email') }}" 
                                               class="input input-bordered @error('email') input-error @enderror" required>
                                        @error('email')
                                            <label class="label">
                                                <span class="label-text-alt text-error">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-control mb-4">
                                    <label class="label">
                                        <span class="label-text font-semibold">Phone Number</span>
                                    </label>
                                    <input type="tel" name="phone_number" value="{{ old('phone_number') }}" 
                                           class="input input-bordered @error('phone_number') input-error @enderror" required>
                                    @error('phone_number')
                                        <label class="label">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>
                                
                                <div class="form-control mb-4">
                                    <label class="label">
                                        <span class="label-text font-semibold">Address</span>
                                    </label>
                                    <textarea name="address" rows="3" 
                                              class="textarea textarea-bordered @error('address') textarea-error @enderror" 
                                              required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <label class="label">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">City</span>
                                        </label>
                                        <input type="text" name="city" value="{{ old('city') }}" 
                                               class="input input-bordered @error('city') input-error @enderror" required>
                                        @error('city')
                                            <label class="label">
                                                <span class="label-text-alt text-error">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold">ZIP Code</span>
                                        </label>
                                        <input type="text" name="zip" value="{{ old('zip') }}" 
                                               class="input input-bordered @error('zip') input-error @enderror" required>
                                        @error('zip')
                                            <label class="label">
                                                <span class="label-text-alt text-error">{{ $message }}</span>
                                            </label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Method -->
                            <div>
                                <h3 class="text-xl font-bold mb-4 flex items-center">
                                    <i class="fas fa-credit-card mr-2 text-primary"></i>
                                    Payment Method
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="payment_method" value="Gcash" class="radio radio-primary" required>
                                        <div class="card bg-base-200 p-4 ml-3 hover:bg-base-300 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-mobile-alt text-2xl text-primary mr-3"></i>
                                                <span class="font-semibold">GCash</span>
                                            </div>
                                        </div>
                                    </label>
                                    
                                    <label class="cursor-pointer">
                                        <input type="radio" name="payment_method" value="PayPal" class="radio radio-primary" required>
                                        <div class="card bg-base-200 p-4 ml-3 hover:bg-base-300 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fab fa-paypal text-2xl text-primary mr-3"></i>
                                                <span class="font-semibold">PayPal</span>
                                            </div>
                                        </div>
                                    </label>
                                    
                                    <label class="cursor-pointer">
                                        <input type="radio" name="payment_method" value="MayaPay" class="radio radio-primary" required>
                                        <div class="card bg-base-200 p-4 ml-3 hover:bg-base-300 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-credit-card text-2xl text-primary mr-3"></i>
                                                <span class="font-semibold">Maya</span>
                                            </div>
                                        </div>
                                    </label>
                                    
                                    <label class="cursor-pointer">
                                        <input type="radio" name="payment_method" value="COD" class="radio radio-primary" required>
                                        <div class="card bg-base-200 p-4 ml-3 hover:bg-base-300 transition-colors">
                                            <div class="flex items-center">
                                                <i class="fas fa-money-bill text-2xl text-primary mr-3"></i>
                                                <span class="font-semibold">Cash on Delivery</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @error('payment_method')
                                    <div class="text-error text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-4 pt-6">
                                <button type="submit" class="btn btn-primary btn-lg flex-1 btn-gradient">
                                    <i class="fas fa-check"></i>
                                    Place Order
                                </button>
                                <a href="{{ route('show-all.books') }}" class="btn btn-outline btn-lg">
                                    <i class="fas fa-arrow-left"></i>
                                    Continue Shopping
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="card bg-base-100 shadow-xl sticky top-24">
                    <div class="card-header bg-primary text-primary-content p-4 rounded-t-2xl">
                        <h3 class="card-title">
                            <i class="fas fa-shopping-cart"></i>
                            Order Summary
                        </h3>
                    </div>
                    <div class="card-body p-6">
                        <div id="cartSummary">
                            <div class="text-center text-base-content/50 py-8">
                                <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                                <p>Your cart is empty</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadCartSummary() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const summaryDiv = document.getElementById('cartSummary');
        
        if (cart.length === 0) {
            summaryDiv.innerHTML = `
                <div class="text-center text-base-content/50 py-8">
                    <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                    <p>Your cart is empty</p>
                </div>
            `;
            return;
        }
        
        let total = 0;
        let html = '<div class="space-y-4">';
        
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            
            html += `
                <div class="flex justify-between items-center p-3 bg-base-200 rounded-lg">
                    <div class="flex-1">
                        <div class="font-semibold text-sm line-clamp-2">${item.title}</div>
                        <div class="text-xs text-base-content/70">Qty: ${item.quantity}</div>
                    </div>
                    <div class="text-right">
                        <div class="font-bold">₱${itemTotal.toFixed(2)}</div>
                    </div>
                </div>
            `;
        });
        
        html += `
            </div>
            <div class="divider"></div>
            <div class="flex justify-between items-center text-lg font-bold">
                <span>Total:</span>
                <span class="text-primary">₱${total.toFixed(2)}</span>
            </div>
        `;
        
        summaryDiv.innerHTML = html;
        
        sessionStorage.setItem('cart_data', JSON.stringify({
            items: cart,
            total: total
        }));
    }
    
    loadCartSummary();
</script>
@endpush
