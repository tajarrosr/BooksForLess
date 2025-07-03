@include('partials.__header')

<body class="bg-gray-50 min-h-screen">
    <x-nav/>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">Complete Your Order</h1>
            
            <div x-data="{
                step: 1,
                orderDetailsConfirmed: false,
                billing: {
                    name: '',
                    email: '',
                    phone_number: '',
                    address: '',
                    city: '',
                    zip: ''
                },
                paymentMethod: '',
                totalPrice: 0,
                isBillingComplete() {
                    return this.billing.name !== '' && this.billing.email !== '' &&
                        this.billing.phone_number !== '' && this.billing.address !== '' &&
                        this.billing.city !== '' && this.billing.zip !== '';
                },
                showError: false
            }" class="space-y-8">
            
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm font-medium text-gray-500">Step <span x-text="step"></span> of 4</span>
                        <span class="text-sm font-medium text-gray-500"><span x-text="Math.round((step-1) * 33.33)"></span>% Complete</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" :style="'width:' + ((step - 1) * 33.33) + '%'"></div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center mb-8">
                    <button :disabled="step === 1" 
                            @click="step = step > 1 ? step - 1 : step" 
                            class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                        Previous
                    </button>
                    <button :disabled="(step === 1 && !orderDetailsConfirmed) || 
                                      (step === 2 && !isBillingComplete()) || 
                                      (step === 3 && paymentMethod === '')" 
                            @click="showError = true; if((step === 1 && !orderDetailsConfirmed) || 
                                      (step === 2 && !isBillingComplete()) || 
                                      (step === 3 && paymentMethod === '')) return; step = step < 4 ? step + 1 : step;" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                        Next
                    </button>
                </div>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf

                    <!-- Step 1: Order Details -->
                    <div x-show="step === 1" class="space-y-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Review Your Order</h2>
                        <div id="order-details-container" class="bg-gray-50 rounded-lg p-6 space-y-4">
                            <!-- Cart items will be injected here by JavaScript -->
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-900">Total Price:</span>
                            <span id="total-price" class="text-2xl font-bold text-blue-600">₱0.00</span>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="confirm" name="confirm" value="Confirm Order Details" required x-model="orderDetailsConfirmed" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="confirm" class="ml-2 text-sm text-gray-900">I confirm that my order details are correct</label>
                        </div>
                        <div x-show="showError && step === 1 && !orderDetailsConfirmed" class="text-red-600 text-sm">
                            Please confirm order details to proceed.
                        </div>
                    </div>

                    <!-- Step 2: Billing Information -->
                    <div x-show="step === 2" class="space-y-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Billing Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" id="name" required x-model="billing.name"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" id="email" required x-model="billing.email"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" pattern="\d{0,11}" required x-model="billing.phone_number"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                <input type="text" name="city" id="city" required x-model="billing.city"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <input type="text" name="address" id="address" required x-model="billing.address"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">Zip Code</label>
                                <input type="number" name="zip" id="zip" required x-model="billing.zip"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div x-show="showError && step === 2 && !isBillingComplete()" class="text-red-600 text-sm">
                            Please fill out all billing information to proceed.
                        </div>
                    </div>

                    <!-- Step 3: Payment Method -->
                    <div x-show="step === 3" class="space-y-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Payment Method</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="relative flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="Gcash" x-model="paymentMethod" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-3 text-sm font-medium text-gray-900">GCash</span>
                            </label>
                            <label class="relative flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="PayPal" x-model="paymentMethod" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-3 text-sm font-medium text-gray-900">PayPal</span>
                            </label>
                            <label class="relative flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="MayaPay" x-model="paymentMethod" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-3 text-sm font-medium text-gray-900">MayaPay</span>
                            </label>
                            <label class="relative flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="COD" x-model="paymentMethod" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <span class="ml-3 text-sm font-medium text-gray-900">Cash on Delivery</span>
                            </label>
                        </div>
                        <div x-show="showError && step === 3 && paymentMethod === ''" class="text-red-600 text-sm">
                            Please select a payment method to proceed.
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div x-show="step === 4" class="space-y-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Order Confirmation</h2>
                        <div class="bg-gray-50 rounded-lg p-6 space-y-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Billing Information</h3>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div><strong>Name:</strong> <span x-text="billing.name"></span></div>
                                    <div><strong>Email:</strong> <span x-text="billing.email"></span></div>
                                    <div><strong>Phone:</strong> <span x-text="billing.phone_number"></span></div>
                                    <div><strong>City:</strong> <span x-text="billing.city"></span></div>
                                    <div class="col-span-2"><strong>Address:</strong> <span x-text="billing.address"></span></div>
                                    <div><strong>Zip:</strong> <span x-text="billing.zip"></span></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Payment Method</h3>
                                <p class="text-sm"><strong>Selected:</strong> <span x-text="paymentMethod"></span></p>
                            </div>
                        </div>
                        <button type="submit" 
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const cartItems = JSON.parse(localStorage.getItem('cart'));
        const orderDetailsContainer = document.getElementById('order-details-container');
        const totalPriceElement = document.getElementById('total-price');

        if (cartItems && cartItems.length > 0) {
            let total = 0;
            cartItems.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('bg-gray-100', 'rounded-lg', 'p-4', 'shadow-md');

                itemElement.innerHTML = `
                    <p class="text-gray-800 font-semibold">Book Name: ${item.book_title}</p>
                    <p class="text-gray-600">Unit Price: ₱${item.book_price}</p>
                    <p class="text-gray-600">Quantity: ${item.quantity}</p>
                `;

                orderDetailsContainer.appendChild(itemElement);

                total += parseFloat(item.book_price) * parseFloat(item.quantity); // Ensure the prices are parsed as floats
            });

            totalPriceElement.innerText = '₱' + total.toFixed(2);

            // Update totalPrice in Alpine.js data
            Alpine.store('totalPrice', total.toFixed(2));
        } else {
            orderDetailsContainer.innerHTML = '<p class="text-gray-500">Your cart is empty.</p>';
        }
    });

</script>
@include('partials.__footer')
