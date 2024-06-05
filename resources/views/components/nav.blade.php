{{-- * NAVIGATION BAR --}}
<style scoped>
    .badge {
        z-index: 0;
    }
</style>
<div class="navbar sticky top-0 z-10 bg-background-50 nav-item transition-all duration-300">
    {{-- ? DARK MODE BUTTON --}}
    <x-dark-toggle/>

        <div class="browse-books">
        <a href="{{route('show-all.books')}}" class="btn btn-ghost btn-circle text-[2.5rem] text-secondary-950 font-butler-stencil font-bold">
            <svg class="util-button-props fill-text-950" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297.001 297.001" xml:space="preserve">
                <g>
                    <g>
                        <path d="M287.034,60.873l-20.819-0.001V39.321c0-4.934-3.61-9.126-8.49-9.856c-0.852-0.128-21.134-3.074-45.557,1.37
                            c-27.227,4.954-48.941,17.171-63.668,35.64c-14.728-18.469-36.442-30.686-63.668-35.64c-24.424-4.443-44.706-1.498-45.557-1.37
                            c-4.88,0.731-8.49,4.923-8.49,9.856v21.551H9.966C4.463,60.872,0,65.335,0,70.839v187.805c0,3.227,1.562,6.254,4.193,8.124
                            s6.004,2.35,9.051,1.288c0.748-0.259,75.431-25.747,131.12-0.345c2.628,1.199,5.645,1.199,8.273,0
                            c55.533-25.33,130.376,0.088,131.12,0.345c1.068,0.372,2.174,0.555,3.276,0.555c2.043,0,4.065-0.628,5.775-1.842
                            c2.631-1.87,4.193-4.897,4.193-8.124V70.84C297,65.336,292.538,60.873,287.034,60.873z M19.933,245.309V80.805h10.852v132.726
                            c0,2.896,1.267,5.646,3.458,7.539c2.191,1.893,5.105,2.742,7.969,2.319c0.55-0.08,43.846-6.024,75.478,15.679
                            C78.725,232.405,39.727,240.112,19.933,245.309z M138.534,230.08c-13.932-12.588-32.079-21.1-53.702-25.034
                            c-10.406-1.894-20.06-2.446-27.78-2.446c-2.292,0-4.414,0.049-6.333,0.126V48.473h-0.001c19.155-0.864,65.752,1.184,87.816,38.587
                            V230.08z M158.466,87.061c21.985-37.243,68.655-39.384,87.816-38.563v154.228c-8.383-0.338-20.62-0.136-34.114,2.32
                            c-21.623,3.934-39.77,12.445-53.702,25.034V87.061z M179.277,239.074c31.636-21.716,74.955-15.766,75.495-15.686
                            c2.871,0.431,5.783-0.413,7.981-2.305c2.198-1.894,3.462-4.65,3.462-7.552V80.806h10.852v164.503
                            C257.267,240.11,218.253,232.4,179.277,239.074z"/>
                    </g>
                </g>
            </svg>
        </a>
    </div>
    
    {{-- ? LOGO BUTTON TO HOME --}}
    <div class="flex-1 justify-center nav-item">
        <a href="{{route('landing')}}" class="btn btn-ghost text-[2.5rem] text-secondary-950 font-butler-stencil font-bold"><img src={{ asset('assets/images/landing-page/BOOKS4LESS-LOGO.png')}} alt="missing logo" class="w-12"></a>
    </div>
    
    <div class="flex-none">
        
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

        {{-- ? USER ICON BUTTON --}}
        <x-account-button/>
    </div>
</div>