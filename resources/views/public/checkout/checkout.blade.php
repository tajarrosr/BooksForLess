<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BooksForLess</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user_styles.css') }}" rel="stylesheet">
    <style>
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 3rem;
        }
        
        .checkout-section {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid var(--border-color);
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }
        
        .order-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-title {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        
        .item-author {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        
        .item-price {
            color: var(--primary-color);
            font-weight: bold;
        }
        
        .order-summary {
            border-top: 1px solid var(--border-color);
            padding-top: 1rem;
            margin-top: 1rem;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .summary-total {
            font-size: 1.25rem;
            font-weight: bold;
            border-top: 1px solid var(--border-color);
            padding-top: 0.5rem;
            margin-top: 0.5rem;
        }
        
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .payment-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 2px solid var(--border-color);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .payment-option:hover {
            border-color: var(--primary-color);
        }
        
        .payment-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(59, 130, 246, 0.1);
        }
        
        .payment-option input[type="radio"] {
            margin-right: 0.75rem;
        }
        
        .empty-cart {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }
        
        @media (max-width: 768px) {
            .checkout-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .payment-methods {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('components.navbar')
    
    <div class="checkout-container">
        <div class="text-center mb-8">
            <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem; color: var(--text-color);">
                Checkout
            </h1>
            <p style="color: #6b7280;">Complete your order</p>
        </div>
        
        <div id="checkout-content">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
    
    <script>
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        document.addEventListener('DOMContentLoaded', function() {
            renderCheckout();
        });
        
        function renderCheckout() {
            const checkoutContent = document.getElementById('checkout-content');
            
            if (cart.length === 0) {
                checkoutContent.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Your cart is empty</h3>
                        <p style="margin-bottom: 2rem;">Add some books to your cart before checking out.</p>
                        <a href="{{ route('show-all.books') }}" class="btn btn-primary">
                            <i class="fas fa-book"></i> Browse Books
                        </a>
                    </div>
                `;
                return;
            }
            
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shipping = subtotal > 1000 ? 0 : 50;
            const total = subtotal + shipping;
            
            checkoutContent.innerHTML = `
                <div class="checkout-grid">
                    <div class="checkout-section">
                        <h2 class="section-title">Billing Information</h2>
                        
                        <form method="POST" action="{{ route('checkout.process') }}" id="checkout-form">
                            @csrf
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                                <div class="form-group">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" id="name" name="name" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-input" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="tel" id="phone_number" name="phone_number" class="form-input" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-input" required>
                            </div>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                                <div class="form-group">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" id="city" name="city" class="form-input" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="zip" class="form-label">ZIP Code</label>
                                    <input type="text" id="zip" name="zip" class="form-input" required>
                                </div>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 1rem; color: var(--text-color);">
                                Payment Method
                            </h3>
                            
                            <div class="payment-methods">
                                <label class="payment-option" onclick="selectPayment(this)">
                                    <input type="radio" name="payment_method" value="Gcash" required>
                                    <div>
                                        <i class="fas fa-mobile-alt" style="color: #007bff; margin-right: 0.5rem;"></i>
                                        GCash
                                    </div>
                                </label>
                                
                                <label class="payment-option" onclick="selectPayment(this)">
                                    <input type="radio" name="payment_method" value="PayPal" required>
                                    <div>
                                        <i class="fab fa-paypal" style="color: #0070ba; margin-right: 0.5rem;"></i>
                                        PayPal
                                    </div>
                                </label>
                                
                                <label class="payment-option" onclick="selectPayment(this)">
                                    <input type="radio" name="payment_method" value="MayaPay" required>
                                    <div>
                                        <i class="fas fa-credit-card" style="color: #00d4aa; margin-right: 0.5rem;"></i>
                                        Maya Pay
                                    </div>
                                </label>
                                
                                <label class="payment-option" onclick="selectPayment(this)">
                                    <input type="radio" name="payment_method" value="COD" required>
                                    <div>
                                        <i class="fas fa-money-bill-wave" style="color: #28a745; margin-right: 0.5rem;"></i>
                                        Cash on Delivery
                                    </div>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 2rem; padding: 1rem;">
                                <i class="fas fa-credit-card"></i> Place Order - ₱${total.toFixed(2)}
                            </button>
                        </form>
                    </div>
                    
                    <div class="checkout-section">
                        <h2 class="section-title">Order Summary</h2>
                        
                        <div style="max-height: 400px; overflow-y: auto; margin-bottom: 1rem;">
                            ${cart.map(item => `
                                <div class="order-item">
                                    <img src="${item.image}" alt="${item.title}" class="item-image">
                                    <div class="item-details">
                                        <div class="item-title">${item.title}</div>
                                        <div class="item-author">by ${item.author}</div>
                                        <div class="item-price">₱${item.price.toFixed(2)} × ${item.quantity}</div>
                                    </div>
                                    <div style="text-align: right;">
                                        <div style="font-weight: bold;">₱${(item.price * item.quantity).toFixed(2)}</div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                        
                        <div class="order-summary">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span>₱${subtotal.toFixed(2)}</span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping:</span>
                                <span>${shipping === 0 ? 'FREE' : '₱' + shipping.toFixed(2)}</span>
                            </div>
                            ${shipping === 0 ? '<div style="font-size: 0.875rem; color: #10b981; margin-bottom: 0.5rem;">Free shipping on orders over ₱1,000!</div>' : ''}
                            <div class="summary-row summary-total">
                                <span>Total:</span>
                                <span>₱${total.toFixed(2)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
        
        function selectPayment(label) {
            // Remove selected class from all payment options
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked option
            label.classList.add('selected');
        }
        
        // Pre-fill form if user is logged in
        @auth
            document.addEventListener('DOMContentLoaded', function() {
                const nameField = document.getElementById('name');
                const emailField = document.getElementById('email');
                
                if (nameField) nameField.value = '{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}';
                if (emailField) emailField.value = '{{ Auth::user()->email }}';
            });
        @endauth

        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            // Store cart data in session storage for order confirmation
            sessionStorage.setItem('lastOrder', JSON.stringify(cart));
        });
    </script>
</body>
</html>
