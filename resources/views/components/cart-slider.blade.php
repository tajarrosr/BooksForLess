<div class="cart-container">
    <div class="cart fixed top-0 left-full w-96 bg-white border-l border-gray-200 h-full transition-all shadow-2xl z-50">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">Shopping Cart</h2>
        </div>
        
        <div class="flex-1 overflow-y-auto p-6">
            <x-cart-card/>
        </div>
        
        <div class="border-t border-gray-200 p-6 bg-gray-50">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold text-gray-900">Total:</span>
                <span class="total text-2xl font-bold text-blue-600">₱0</span>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <button onclick="toggleCartDrawer()" 
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                    Close
                </button>
                <a href="{{route('checkout')}}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-center">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
