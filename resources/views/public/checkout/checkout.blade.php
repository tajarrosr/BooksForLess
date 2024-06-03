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
        <div x-data="{ step: 1 }" class="space-y-8">
    <!-- Step Navigation -->
    <div class="flex justify-between items-center mb-8">
        <button :disabled="step === 1" @click="step--" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Previous</button>
        <span class="text-lg font-semibold">Step <span x-text="step"></span> of 4</span>
        <button :disabled="step === 4" @click="step++" class="bg-blue-500 text-white py-2 px-4 rounded-md">Next</button>
    </div>

    <!-- Progress Bar -->
    <ol class="flex items-center w-full mb-8">
        <template x-for="(stepNumber, index) in [1, 2, 3, 4]" :key="index">
            <li class="flex w-full items-center" :class="{'text-blue-600 after:border-blue-100 dark:text-blue-500 dark:after:border-blue-800': step > index+1, 'after:border-gray-100 dark:after:border-gray-700': step <= index+1}">
                <span class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0" :class="{'text-blue-600 dark:text-blue-300': step > index+1, 'text-gray-500 dark:text-gray-100': step <= index+1}">
                    <template x-if="step > index+1">
                        <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </template>
                    <template x-if="step <= index+1">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <!-- Insert your SVG path here for an incomplete step -->
                        </svg>
                    </template>
                </span>
                <div class="after:content-[''] after:w-full after:h-1 after:border-b after:inline-block" :class="{'after:border-blue-100 dark:after:border-blue-800': step > index+1, 'after:border-gray-100 dark:after:border-gray-700': step <= index+1}"></div>
            </li>
        </template>
    </ol>

    <!-- Steps Content -->
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
            @csrf
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
        </form>
    </div>

    <!-- Step 3: Payment Method -->
    <div x-show="step === 3" class="bg-gray-100 p-6 rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Payment Method</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            

        </form>
    </div>

    <!-- Step 4: Confirmation -->
    <div x-show="step === 4" class="bg-gray-100 p-6 rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Confirm your order</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            <p>Name: </p>
            <p>Address: </p>
            <p>Contact number: </p>
            <p>Total payment: </p>
            
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md">Submit</button>
        </form>
        </div>
    </div>

    </main>

    <footer>
        <!-- footer content -->
    </footer>

</body>
</html>
