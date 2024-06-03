{{-- * NAVIGATION BAR --}}
<style>
    .badge {
        z-index: 0;
    }
</style>
<div class="navbar bg-background-200 sticky top-0 z-2">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl text-secondary-950">BooksForLess</a>
    </div>
    
    <div class="flex-none">
        {{-- ? DARK MODE BUTTON --}}
        <x-dark-toggle/>
        <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle" onclick="toggleCartDrawer()">
            <div class="indicator">
                {{-- ? ICON BAG --}}
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="fill-text-950"><path d="M240-80q-33 0-56.5-23.5T160-160v-480q0-33 23.5-56.5T240-720h80q0-66 47-113t113-47q66 0 113 47t47 113h80q33 0 56.5 23.5T800-640v480q0 33-23.5 56.5T720-80H240Zm0-80h480v-480h-80v80q0 17-11.5 28.5T600-520q-17 0-28.5-11.5T560-560v-80H400v80q0 17-11.5 28.5T360-520q-17 0-28.5-11.5T320-560v-80h-80v480Zm160-560h160q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720ZM240-160v-480 480Z"/></svg>          
                {{-- ? INDICATOR BADGE --}}
                <span id="cart-item-count" class="badge badge-sm indicator-item bg-badge-800 text-text-50 dark:text-text-950">0</span>
            </div>
        </div>  
        </div>

        {{-- ? ACCOUNT AVATAR BUTTON --}}
        <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
            </div>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <li>
            <a class="justify-between">
                Profile
                <span class="badge bg-badge-800 text-text-50 dark:text-text-950">New</span>
            </a>
            </li>
            <li><a>Settings</a></li>
            <li><a>Logout</a></li>
        </ul>
        </div>
    </div>
    </div>