    {{-- * ADD TO CART SLIDER (LEFT) --}}
    <div class="cart-container">
        <div class="cart fixed top-0 left-full w-2/5 bg-background-100 border-l-2 border-solid border-accent-500 h-dvh transition-all shadow-2xl">
            <h1 class="uppercase text-4xl text-text-900 m-0 ml-5 pt-0 pr-5 h-20 flex items-center font-butler">Bag</h1>

            {{-- * FRAGMENTS --}}
            <x-cart-card/>


            <div class="check-out-container border-solid border-t-2 border-accent-500 absolute bottom-0 w-full grid grid-cols-2 grid-rows-2 text-text-800 shadow-inner font-semibold">
                <div class="total-label text-center capitalize item-1">Total:</div>
                <div class="total item-2 text-center font-bold">₱0</div>
                <div class="close-cart item-3 uppercase text-center cursor-pointer" onclick="toggleCartDrawer()">close</div>
                <div class="check-out-button item-4 uppercase text-center">
                    <button onclick="" class="uppercase">checkout</button></div>
                {{-- cursor-pointer text-text-50 bg-primary-900 w-full h-16 flex items-center justify-center font-bold even:bg-gray-100 --}}
            </div>
        </div>
    </div>