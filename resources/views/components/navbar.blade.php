<nav class="navbar">
    <div style="width: 100%; padding: 0 1rem;">
        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <a href="{{ route('landing') }}" style="display: flex; align-items: center;">
                <img src="{{ asset('assets/images/landing-page/BOOKS4LESS-LOGO.png') }}" 
                     alt="BooksForLess Logo" 
                     style="height: 40px; width: auto;">
            </a>
            
            <!-- Desktop Navigation -->
            <div class="desktop-nav" style="display: flex; gap: 1.5rem; align-items: center;">
                <a href="{{ route('show-all.books') }}" class="nav-link">Browse Books</a>
                
                @auth
                    <div style="position: relative;" id="user-dropdown">
                        <button onclick="toggleUserDropdown()" class="nav-link" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-user"></i>
                            <span>{{ Auth::user()->first_name }}</span>
                            <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
                        </button>
                        <div id="dropdown-menu" class="dropdown-menu">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-circle"></i> Profile
                            </a>
                            <button onclick="toggleTheme()" class="dropdown-item theme-toggle-btn">
                                <i class="fas fa-moon" id="theme-icon-dropdown"></i> 
                                <span id="theme-text">Dark Mode</span>
                            </button>
                            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div style="position: relative;" id="guest-dropdown">
                        <button onclick="toggleGuestDropdown()" class="nav-link" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-user"></i>
                            <span class="desktop-only">Account</span>
                            <i class="fas fa-chevron-down" style="font-size: 0.75rem;"></i>
                        </button>
                        <div id="guest-dropdown-menu" class="dropdown-menu">
                            <a href="{{ route('login') }}" class="dropdown-item">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="dropdown-item">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                            <button onclick="toggleTheme()" class="dropdown-item theme-toggle-btn">
                                <i class="fas fa-moon" id="theme-icon-dropdown-guest"></i> 
                                <span id="theme-text-guest">Dark Mode</span>
                            </button>
                        </div>
                    </div>
                @endauth
                
                <button class="btn btn-primary cart-btn" onclick="toggleCart()" style="position: relative;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="desktop-only" style="margin-left: 0.5rem;">Cart</span>
                    <span id="cart-count" class="cart-badge">0</span>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div class="mobile-nav" style="display: none;">
                <button class="btn btn-primary cart-btn" onclick="toggleCart()" style="position: relative; margin-right: 0.5rem;">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cart-count-mobile" class="cart-badge">0</span>
                </button>
                
                <button onclick="toggleMobileMenu()" class="mobile-menu-btn">
                    <i class="fas fa-bars" id="mobile-menu-icon"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="mobile-menu-overlay">
            <div class="mobile-menu-content">
                <div class="mobile-menu-header">
                    <img src="{{ asset('assets/images/landing-page/BOOKS4LESS-LOGO.png') }}" 
                         alt="BooksForLess Logo" 
                         style="height: 30px; width: auto;">
                    <button onclick="toggleMobileMenu()" class="mobile-close-btn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mobile-menu-items">
                    <a href="{{ route('show-all.books') }}" class="mobile-menu-item">
                        <i class="fas fa-book"></i> Browse Books
                    </a>
                    
                    @auth
                        <div class="mobile-menu-section">
                            <div class="mobile-user-info">
                                <i class="fas fa-user-circle"></i>
                                <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                            </div>
                            <a href="#" class="mobile-menu-item">
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </div>
                        
                        <div class="mobile-menu-section">
                            <button onclick="toggleTheme()" class="mobile-menu-item theme-toggle-mobile">
                                <i class="fas fa-moon" id="theme-icon-mobile"></i> 
                                <span id="theme-text-mobile">Dark Mode</span>
                            </button>
                        </div>
                        
                        <div class="mobile-menu-section">
                            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="mobile-menu-item logout-btn">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="mobile-menu-section">
                            <a href="{{ route('login') }}" class="mobile-menu-item">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="mobile-menu-item">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </div>
                        
                        <div class="mobile-menu-section">
                            <button onclick="toggleTheme()" class="mobile-menu-item theme-toggle-mobile">
                                <i class="fas fa-moon" id="theme-icon-mobile-guest"></i> 
                                <span id="theme-text-mobile-guest">Dark Mode</span>
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 0.5rem;
    box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1);
    min-width: 180px;
    z-index: 1000;
    overflow: hidden;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 100%;
    padding: 0.75rem 1rem;
    color: var(--text-color);
    text-decoration: none;
    background: none;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s ease;
    font-size: 0.875rem;
}

.dropdown-item:hover {
    background-color: var(--card-bg);
}

.cart-badge {
    background: var(--error-color);
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -8px;
    right: -8px;
}

.mobile-menu-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
}

.mobile-menu-content {
    position: absolute;
    top: 0;
    right: 0;
    width: 280px;
    height: 100vh;
    background: var(--bg-color);
    padding: 1rem;
    overflow-y: auto;
}

.mobile-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 1rem;
}

.mobile-close-btn {
    background: none;
    border: none;
    font-size: 1.25rem;
    color: var(--text-color);
    cursor: pointer;
    padding: 0.5rem;
}

.mobile-menu-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 100%;
    padding: 1rem;
    color: var(--text-color);
    text-decoration: none;
    background: none;
    border: none;
    cursor: pointer;
    border-radius: 0.5rem;
    margin-bottom: 0.25rem;
    transition: background-color 0.2s ease;
}

.mobile-menu-item:hover {
    background-color: var(--card-bg);
}

.mobile-menu-section {
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
}

.mobile-menu-section:last-child {
    border-bottom: none;
}

.mobile-user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    background: var(--card-bg);
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.mobile-menu-btn {
    background: none;
    border: none;
    color: var(--text-color);
    font-size: 1.25rem;
    cursor: pointer;
    padding: 0.5rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .desktop-nav {
        display: none !important;
    }
    
    .mobile-nav {
        display: flex !important;
        align-items: center;
    }
    
    .navbar {
        padding: 0.75rem 0;
    }
}

@media (min-width: 769px) {
    .desktop-only {
        display: inline;
    }
}

@media (max-width: 768px) {
    .desktop-only {
        display: none;
    }
}

@media (max-width: 480px) {
    .mobile-menu-content {
        width: 100%;
    }
}
</style>

<script>
function toggleTheme() {
    const body = document.body;
    const isDark = body.getAttribute('data-theme') === 'dark';
    
    // Theme icons and text elements
    const themeIcons = [
        document.getElementById('theme-icon-dropdown'),
        document.getElementById('theme-icon-dropdown-guest'),
        document.getElementById('theme-icon-mobile'),
        document.getElementById('theme-icon-mobile-guest')
    ];
    
    const themeTexts = [
        document.getElementById('theme-text'),
        document.getElementById('theme-text-guest'),
        document.getElementById('theme-text-mobile'),
        document.getElementById('theme-text-mobile-guest')
    ];
    
    if (isDark) {
        body.removeAttribute('data-theme');
        localStorage.setItem('theme', 'light');
        
        themeIcons.forEach(icon => {
            if (icon) {
                icon.className = 'fas fa-moon';
            }
        });
        
        themeTexts.forEach(text => {
            if (text) {
                text.textContent = 'Dark Mode';
            }
        });
    } else {
        body.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        
        themeIcons.forEach(icon => {
            if (icon) {
                icon.className = 'fas fa-sun';
            }
        });
        
        themeTexts.forEach(text => {
            if (text) {
                text.textContent = 'Light Mode';
            }
        });
    }
}

function toggleUserDropdown() {
    const dropdown = document.getElementById('dropdown-menu');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

function toggleGuestDropdown() {
    const dropdown = document.getElementById('guest-dropdown-menu');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('mobile-menu-icon');
    
    if (mobileMenu.style.display === 'block') {
        mobileMenu.style.display = 'none';
        menuIcon.className = 'fas fa-bars';
        document.body.style.overflow = 'auto';
    } else {
        mobileMenu.style.display = 'block';
        menuIcon.className = 'fas fa-times';
        document.body.style.overflow = 'hidden';
    }
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    const userDropdown = document.getElementById('user-dropdown');
    const guestDropdown = document.getElementById('guest-dropdown');
    const userDropdownMenu = document.getElementById('dropdown-menu');
    const guestDropdownMenu = document.getElementById('guest-dropdown-menu');
    
    if (userDropdown && !userDropdown.contains(event.target) && userDropdownMenu) {
        userDropdownMenu.style.display = 'none';
    }
    
    if (guestDropdown && !guestDropdown.contains(event.target) && guestDropdownMenu) {
        guestDropdownMenu.style.display = 'none';
    }
});

// Initialize theme on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    const isDark = savedTheme === 'dark';
    
    if (isDark) {
        document.body.setAttribute('data-theme', 'dark');
    }
    
    // Update all theme icons and texts
    const themeIcons = [
        document.getElementById('theme-icon-dropdown'),
        document.getElementById('theme-icon-dropdown-guest'),
        document.getElementById('theme-icon-mobile'),
        document.getElementById('theme-icon-mobile-guest')
    ];
    
    const themeTexts = [
        document.getElementById('theme-text'),
        document.getElementById('theme-text-guest'),
        document.getElementById('theme-text-mobile'),
        document.getElementById('theme-text-mobile-guest')
    ];
    
    themeIcons.forEach(icon => {
        if (icon) {
            icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        }
    });
    
    themeTexts.forEach(text => {
        if (text) {
            text.textContent = isDark ? 'Light Mode' : 'Dark Mode';
        }
    });
});

// Sync cart counts
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    
    const cartCounts = [
        document.getElementById('cart-count'),
        document.getElementById('cart-count-mobile')
    ];
    
    cartCounts.forEach(count => {
        if (count) {
            count.textContent = totalItems;
        }
    });
}

// Initialize cart count on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCount();
});
</script>
