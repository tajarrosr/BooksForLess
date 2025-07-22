<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - BooksForLess</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/user_styles.css') }}" rel="stylesheet">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 2rem;
        }
        
        .success-card {
            background: var(--bg-color);
            padding: 4rem 3rem;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: bounce 1s ease-in-out;
        }
        
        .success-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 1rem;
        }
        
        .success-message {
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .order-details {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .detail-row:last-child {
            margin-bottom: 0;
            font-weight: bold;
            border-top: 1px solid var(--border-color);
            padding-top: 0.5rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        @media (max-width: 768px) {
            .success-card {
                padding: 3rem 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check" style="color: white; font-size: 2rem;"></i>
            </div>
            
            <h1 class="success-title">Order Confirmed!</h1>
            
            <p class="success-message">
                Thank you for your order! We've received your purchase and will process it shortly. 
                You'll receive a confirmation email with your order details and tracking information.
            </p>
            
            <div class="order-details" id="order-summary">
                <!-- Order details will be populated by JavaScript -->
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('show-all.books') }}" class="btn btn-primary">
                    <i class="fas fa-book"></i> Continue Shopping
                </a>
                <a href="{{ route('landing') }}" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // Clear cart after successful order
        localStorage.removeItem('cart');
        
        // Display order summary from cart data if available
        document.addEventListener('DOMContentLoaded', function() {
            const orderSummary = document.getElementById('order-summary');
            const orderData = sessionStorage.getItem('lastOrder');
            
            if (orderData) {
                const order = JSON.parse(orderData);
                const total = order.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const shipping = total > 1000 ? 0 : 50;
                const finalTotal = total + shipping;
                
                orderSummary.innerHTML = `
                    <h3 style="margin-bottom: 1rem; color: var(--text-color);">Order Summary</h3>
                    <div class="detail-row">
                        <span>Items (${order.reduce((sum, item) => sum + item.quantity, 0)}):</span>
                        <span>₱${total.toFixed(2)}</span>
                    </div>
                    <div class="detail-row">
                        <span>Shipping:</span>
                        <span>${shipping === 0 ? 'FREE' : '₱' + shipping.toFixed(2)}</span>
                    </div>
                    <div class="detail-row">
                        <span>Total:</span>
                        <span>₱${finalTotal.toFixed(2)}</span>
                    </div>
                `;
                
                // Clear the session storage
                sessionStorage.removeItem('lastOrder');
            } else {
                orderSummary.innerHTML = `
                    <h3 style="margin-bottom: 1rem; color: var(--text-color);">Order Summary</h3>
                    <p style="color: #6b7280; text-align: center;">Order details will be sent to your email.</p>
                `;
            }
        });
        
        // Apply theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.setAttribute('data-theme', 'dark');
            }
        });
    </script>
</body>
</html>
