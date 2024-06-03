<!-- resources/views/checkout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Multi-Step Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</head>
<body>

    <header>
        <!-- header content-->
    </header>

    <main class="py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <div x-data="{ step: 1 }" class="space-y-8">
                <!-- Step Navigation -->
                <div class="flex justify-between items-center">
                    <button :disabled="step === 1" @click="step--" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Previous</button>
                    <span class="text-lg font-semibold">Step <span x-text="step"></span> of 3</span>
                    <button :disabled="step === 3" @click="step++" class="bg-blue-500 text-white py-2 px-4 rounded-md">Next</button>
                </div>

                <!-- Step 1: Product Information -->
                <div x-show="step === 1" class="bg-gray-100 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Product Information</h2>
                    <!-- Product details go here -->
                    <div>
                        <p>Product Name: Example Product 1</p>
                        <p>Price: $10.00</p>
                    </div>
                </div>

                <!-- Step 2: Billing Information -->
                <div x-show="step === 2" class="bg-gray-100 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Billing Information</h2>
                    <form>
                        <!-- Billing fields go here -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" id="name" name="name" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" id="email" name="email" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number:</label>
                            <input type="text" id="phone_number" name="phone_number" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                    </form>
                </div>

                <!-- Step 3: Address Information -->
                <div x-show="step === 3" class="bg-gray-100 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Address Information</h2>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                            <input type="text" id="address" name="address" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
                            <input type="text" id="city" name="city" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="zip" class="block text-sm font-medium text-gray-700">ZIP:</label>
                            <input type="text" id="zip" name="zip" required class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- footer content -->
    </footer>

</body>
</html>
