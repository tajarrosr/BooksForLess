{{-- * NAVIGATION BAR --}}
<style>
    .badge {
        z-index: 0;
    }
</style>
<div class="navbar bg-background-200">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl text-secondary-950">BooksForLess</a>
    </div>
    
    <div class="flex-none">
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
