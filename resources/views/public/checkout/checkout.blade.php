@include('partials.__header')

<body style="background-image: url('/assets/images/check-out/CheckoutBackground.jpg'); background-size: cover; background-position: center;" class="bg-background-300 h-auto min-h-screen">

    <x-nav/>

    <main class="container mx-auto mt-10 bg-background-100 p-4 rounded-2xl">
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
        <!-- Step Navigation -->
        <div class="flex justify-between items-center mb-8">
            <button :disabled="step === 1" @click="step = step > 1 ? step - 1 : step" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Previous</button>
            <span class="text-lg font-semibold">Step <span x-text="step"></span> of 4</span>
            <button :disabled="(step === 1 && !orderDetailsConfirmed) || 
                              (step === 2 && !isBillingComplete()) || 
                              (step === 3 && paymentMethod === '')" 
                    @click="showError = true; if((step === 1 && !orderDetailsConfirmed) || 
                              (step === 2 && !isBillingComplete()) || 
                              (step === 3 && paymentMethod === '')) return; step = step < 4 ? step + 1 : step;" 
                    class="bg-blue-500 text-white py-2 px-4 rounded-md">Next</button>
        </div>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full">
                <div class="h-2 bg-blue-500 rounded-full" :style="'width:' + ((step - 1) * 33.33) + '%'"></div>
            </div>

            <!-- * Multi-Step Form -->
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <!-- Step 1: Order Details -->
                <div x-show="step === 1" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Order Details</h2>
                    <div id="order-details-container" class="bg-background-50 w-full shadow-md rounded-lg p-2 flex flex-wrap justify-center items-center">
                        <!-- Cart items will be injected here by JavaScript -->
                    </div>
                    <div class="bg-background-50 w-1/5 shadow-md rounded-lg p-6 flex flex-wrap m-4">
                        <label class="block text-text-900">Total Price:</label>
                        <label id="total-price" class="block text-text-900">₱0.00</label>
                    </div>
                    <input type="checkbox" id="confirm" name="confirm" value="Confirm Order Details" required x-model="orderDetailsConfirmed">
                    <label>Confirm Order Details</label>
                    <div x-show="showError" class="mt-4" x-cloak>
                        <template x-if="step === 1 && !orderDetailsConfirmed">
                            <p class="text-red-500 text-sm">Please confirm order details to proceed.</p>
                        </template>
                    </div>
                </div>

                <!-- Step 2: Billing Information -->
                <div x-show="step === 2" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Billing Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.name">
                                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.email">
                                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" pattern="\d{0,11}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.phone_number">
                                @error('phone_number')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- Address, City, Zip Code -->
                        <div class="space-y-4">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.address">
                                @error('address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.city">
                                @error('city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="zip" class="block text-sm font-medium text-gray-700">Zip Code</label>
                                <input type="number" name="zip" id="zip" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.zip">
                                @error('zip')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div x-show="showError" class="mt-4" x-cloak>
                        <template x-if="step === 2 && !isBillingComplete()">
                            <p class="text-red-500 text-sm">Please fill out all billing information to proceed.</p>
                        </template>
                    </div>
                </div>

                <!-- Step 3: Payment Method -->
                <div x-show="step === 3" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Payment Method</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select Payment Method</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="payment_method" value="Gcash" class="form-radio" required x-model="paymentMethod">
                                <span class="ml-2">Gcash</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="payment_method" value="PayPal" class="form-radio" required x-model="paymentMethod">
                                <span class="ml-2">PayPal</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="payment_method" value="MayaPay" class="form-radio" required x-model="paymentMethod">
                                <span class="ml-2">MayaPay</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="payment_method" value="COD" class="form-radio" required x-model="paymentMethod">
                                <span class="ml-2">Cash on Delivery (COD)</span>
                            </label>
                        </div>
                        @error('payment_method')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        <div x-show="showError" class="mt-4" x-cloak>
                            <template x-if="step === 3 && paymentMethod === ''">
                                <p class="text-red-500 text-sm">Please select a payment method to proceed.</p>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Confirmation -->
                <div x-show="step === 4" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Confirmation</h2>
                    <!-- Flex Container -->
                    <div class="flex flex-wrap w-full bg-background-100 p-4 rounded-lg shadow">
                        <!-- Billing Information -->
                        <div class="w-full md:w-1/2 p-4 border-r border-accent-950">
                            <h3 class="text-lg font-semibold mb-2">Billing Information</h3>
                            <p><strong>Name:</strong> <span x-text="billing.name"></span></p>
                            <p><strong>Email:</strong> <span x-text="billing.email"></span></p>
                            <p><strong>Phone Number:</strong> <span x-text="billing.phone_number"></span></p>
                            <p><strong>Address:</strong> <span x-text="billing.address"></span></p>
                            <p><strong>City:</strong> <span x-text="billing.city"></span></p>
                            <p><strong>Zip Code:</strong> <span x-text="billing.zip"></span></p>
                        </div>
                        <!-- Payment Method -->
                        <div class="w-full md:w-1/2 p-4">
                            <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
                            <p><strong>Selected Payment Method:</strong> <span x-text="paymentMethod"></span></p>
                        </div>
                        
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mt-4">Place Order</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

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
                itemElement.classList.add('bg-background-200', 'w-full', 'shadow-md', 'rounded-lg', 'p-6', 'm-2');

                itemElement.innerHTML = `
                    <label class="block text-text-900">Book Name: ${item.book_title}</label>
                    <label class="block text-text-900">Unit Price: ₱${item.book_price}</label>
                    <label class="block text-text-900">Quantity: ${item.quantity}</label>
                `;

                orderDetailsContainer.appendChild(itemElement);

                total += parseFloat(item.book_price) * parseFloat(item.quantity); // Ensure the prices are parsed as floats
            });

            totalPriceElement.innerText = '₱' + total.toFixed(2);

            // Update totalPrice in Alpine.js data
            Alpine.store('totalPrice', total.toFixed(2));
        } else {
            orderDetailsContainer.innerHTML = '<p>Your cart is empty.</p>';
        }
    });

</script>
@include('partials.__footer')
