@include('partials.__header')
<body class="bg-background-300 vh-100">

    <x-nav/>

    <main class="container mx-auto mt-10">
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

            <!-- Multi-Step Form -->
            <form action="{{ route('checkout.process') }}" method="POST"
            >
                @csrf

                <!-- Step 1: Order Details -->
                <div x-show="step === 1" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Order Details</h2>
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
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.name">
                        @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.email">
                        @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" pattern="\d{0,11}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.phone_number">
                        @error('phone_number')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.address">
                        @error('address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.city">
                        @error('city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="zip" class="block text-sm font-medium text-gray-700">Zip Code</label>
                        <input type="number" name="zip" id="zip" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required x-model="billing.zip">
                        @error('zip')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        <div x-show="showError" class="mt-4" x-cloak>
                            <template x-if="step === 2 && !isBillingComplete()">
                                <p class="text-red-500 text-sm">Please fill out all billing information to proceed.</p>
                            </template>
                        </div>
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
                                <p class="text-red-500 text-sm">Please select a payment method to .</p>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Confirmation -->
                <div x-show="step === 4" class="bg-background-200 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Confirmation</h2>
                    <!-- Display Billing Information -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Billing Information</h3>
                        <p><strong>Name:</strong> <span x-text="billing.name"></span></p>
                        <p><strong>Email:</strong> <span x-text="billing.email"></span></p>
                        <p><strong>Phone Number:</strong> <span x-text="billing.phone_number"></span></p>
                        <p><strong>Address:</strong> <span x-text="billing.address"></span></p>
                        <p><strong>City:</strong> <span x-text="billing.city"></span></p>
                        <p><strong>Zip Code:</strong> <span x-text="billing.zip"></span></p>
                    </div>
                    <!-- Display Payment Method -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
                        <p><strong>Selected Payment Method:</strong> <span x-text="paymentMethod"></span></p>
                    </div>
                    <!-- Confirmation details go here -->
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mt-4">Submit</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

</body>
@include('partials.__footer')
