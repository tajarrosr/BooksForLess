<!-- resources/views/checkout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</head>
<body class="bg-gray-100">

    <header>
        <!-- Header content -->
    </header>

    <main class="container mx-auto mt-10">
        <div x-data="{ step: 1 }" class="space-y-8">
            <!-- Step Navigation -->
            <div class="flex justify-between items-center mb-8">
                <button :disabled="step === 1" @click="step--" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Previous</button>
                <span class="text-lg font-semibold">Step <span x-text="step"></span> of 4</span>
                <button :disabled="step === 4" @click="step++" class="bg-blue-500 text-white py-2 px-4 rounded-md">Next</button>
            </div>

            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full">
                <div class="h-2 bg-blue-500 rounded-full" :style="'width:' + ((step - 1) * 33.33) + '%'"></div>
            </div>

            <!-- Steps Content -->
            <div x-show="step === 1" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Product Information</h2>
                <!-- Product details go here -->
            </div>

            <div x-show="step === 2" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Billing Information</h2>
                <!-- Billing form goes here -->
            </div>

            <div x-show="step === 3" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Payment Method</h2>
                <!-- Payment form goes here -->
            </div>

            <div x-show="step === 4" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Confirmation</h2>
                <!-- Confirmation details go here -->
            </div>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

</body>
</html>
