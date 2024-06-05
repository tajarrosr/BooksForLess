<style scoped>
    .badge {
        z-index: 0;
    }
</style>        
        {{-- ** CART ICON BUTTON --}}
        <div class="dropdown dropdown-end nav-item">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle" onclick="toggleCartDrawer()">
                <div class="indicator nav-item">
                    {{-- ? ICON BAG --}}
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-950"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>          
                    {{-- ? INDICATOR BADGE --}}
                    <span id="cart-item-count" class="badge badge-sm indicator-item bg-badge-800 text-text-50 dark:text-text-950 font-iphone font-bold">0</span>
                </div>
            </div>  
        </div>