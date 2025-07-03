@include('partials.__header')

<body class="bg-gray-50 min-h-screen">
    <x-navConfirmed/>
    
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="md:flex">
                <!-- Left side with image -->
                <div class="md:w-1/2">
                    <img src="/assets/images/check-out/delivery.jpg" 
                         alt="Delivery" 
                         class="w-full h-64 md:h-full object-cover">
                </div>
                
                <!-- Right side with content -->
                <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                    <div class="text-center">
                        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                            <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Order Confirmed!</h1>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Thank you for your purchase! Your order has been successfully placed and is being prepared for shipment. 
                            You can expect delivery within 2-5 business days.
                        </p>
                        
                        <div class="bg-blue-50 rounded-lg p-4 mb-8">
                            <p class="text-sm text-blue-800">
                                <strong>Need help?</strong> Contact our customer service team if you have any questions about your order.
                            </p>
                        </div>
                        
                        <!-- Social Media Links -->
                        <div class="flex justify-center space-x-4 mb-8">
                            <a href="https://www.facebook.com" class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C3.85 14.724 3.85 12.78 5.126 11.504c1.276-1.276 3.22-1.276 4.496 0 1.276 1.276 1.276 3.22 0 4.496-.875.807-2.026 1.297-3.323 1.297z"/>
                                </svg>
                            </a>
                            <a href="mailto:support@example.com" class="text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-.904.732-1.636 1.636-1.636h3.819l6.545 4.91 6.545-4.91h3.819A1.636 1.636 0 0 1 24 5.457z"/>
                                </svg>
                            </a>
                        </div>
                        
                        <a href="/browse-books" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('partials.__footer')
