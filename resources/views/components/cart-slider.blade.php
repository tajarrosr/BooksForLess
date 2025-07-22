<div class="cart-overlay" id="cart-overlay" onclick="toggleCart()"></div>
<div class="cart-slider" id="cart-slider">
    <div class="cart-header">
        <h3>Shopping Cart</h3>
        <button onclick="toggleCart()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer;">×</button>
    </div>
    
    <div class="cart-items" id="cart-items">
        <!-- Cart items will be populated by JavaScript -->
    </div>
    
    <div class="cart-footer" style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
        <div class="cart-total" style="margin-bottom: 1rem;">
            <strong>Total: ₱<span id="cart-total">0.00</span></strong>
        </div>
        <a href="{{ route('checkout') }}" class="btn btn-primary" style="width: 100%;">
            Proceed to Checkout
        </a>
    </div>
</div>

<script>
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function toggleCart() {
    const cartSlider = document.getElementById('cart-slider');
    const cartOverlay = document.getElementById('cart-overlay');
    
    cartSlider.classList.toggle('open');
    cartOverlay.classList.toggle('active');
    
    if (cartSlider.classList.contains('open')) {
        document.body.style.overflow = 'hidden';
        renderCart();
    } else {
        document.body.style.overflow = 'auto';
    }
}

function addToCart(bookId, title, author, price, image) {
    const existingItem = cart.find(item => item.id === bookId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: bookId,
            title: title,
            author: author,
            price: parseFloat(price),
            image: image,
            quantity: 1
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    
    // Show success message
    alert('Book added to cart!');
}

function removeFromCart(bookId) {
    cart = cart.filter(item => item.id !== bookId);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    renderCart();
}

function updateQuantity(bookId, change) {
    const item = cart.find(item => item.id === bookId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            removeFromCart(bookId);
        } else {
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }
    }
}

function renderCart() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    
    if (cart.length === 0) {
        cartItems.innerHTML = '<p style="text-align: center; padding: 2rem; color: #6b7280;">Your cart is empty</p>';
        cartTotal.textContent = '0.00';
        return;
    }
    
    let total = 0;
    cartItems.innerHTML = cart.map(item => {
        total += item.price * item.quantity;
        return `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.title}" class="cart-item-image">
                <div class="cart-item-info">
                    <div class="cart-item-title">${item.title}</div>
                    <div class="cart-item-author">${item.author}</div>
                    <div class="cart-item-price">₱${item.price.toFixed(2)}</div>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                        <span>${item.quantity}</span>
                        <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                        <button onclick="removeFromCart(${item.id})" style="margin-left: 1rem; color: var(--error-color); background: none; border: none; cursor: pointer;">Remove</button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
    
    cartTotal.textContent = total.toFixed(2);
}

function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
}

// Initialize cart on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});
</script>
