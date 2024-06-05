{{-- * NAVIGATION BAR --}}
<div class="navbar sticky top-0 z-5 bg-background-50 nav-item transition-all duration-300">
    {{-- ? DARK MODE BUTTON --}}
    <x-dark-toggle/>

    {{-- ? BROWSE BOOKS BUTTON --}}
    <x-browse-books-button/>
    
    {{-- ? LOGO BUTTON TO HOME --}}
    <x-home-button/>
    
    <div class="flex-none">

        {{-- ? BAG/CART ICON BUTTON --}}
        <x-cart-icon-button/>

        {{-- ? USER ICON BUTTON --}}
        <x-account-button/>
    </div>
</div>