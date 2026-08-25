<header class="modern-header" id="modern-header">

    @php($coupon = \App\Models\Coupon::active()->public()->first())

    {{-- Promo Bar --}}
    @if($coupon)
        <div class="modern-promo">
            <div class="modern-promo-content">
                <span>
                    {{ $coupon->value }}{{ $coupon->type == 'percentage' ? '%' : '' }} OFF
                </span>

                <span class="modern-promo-code">
                    USE CODE:
                    <strong>{{ $coupon->code }}</strong>
                </span>

                <a href="{{ route('shop.index') }}">
                    SHOP NOW
                    <span>→</span>
                </a>
            </div>
        </div>
    @endif

    {{-- Main Header --}}
    <div class="modern-header-main">
        <div class="modern-header-inner">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="modern-logo">
                <img src="{{ asset('img/metjar.png') }}" alt="{{ config('app.name') }}">
            </a>

            {{-- Desktop Navigation --}}
            <nav class="modern-navigation">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('shop.index') }}"
                   class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
                    Shop
                </a>

                <div class="modern-nav-dropdown">
                    <a href="{{ route('shop.index') }}">
                        Categories
                        <span>⌄</span>
                    </a>

                    <div class="modern-dropdown">
                        @foreach($shop_categories_menu as $global_category)
                            <a href="{{ route('shop.index', $global_category->slug) }}">
                                {{ $global_category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('contact.index') }}"
                   class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                    Contact
                </a>

                <div class="modern-nav-dropdown">
                    <a href="#">
                        More
                        <span>⌄</span>
                    </a>

                    <div class="modern-dropdown">
                        @include('partials.frontend.pages')
                    </div>
                </div>
            </nav>

            {{-- Header Actions --}}
            <div class="modern-header-actions">

                {{-- Search --}}
                <button type="button"
                        class="modern-icon-button"
                        id="modern-search-button"
                        aria-label="Search">
                    <i class="fas fa-search"></i>
                </button>

                {{-- Wishlist --}}
                <div class="modern-action-item">
                    <livewire:frontend.header.wishlist-component />
                </div>

                {{-- Account --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="modern-account-link">
                        <i class="far fa-user"></i>
                        <span>Login</span>
                    </a>
                @else
                    <div class="modern-nav-dropdown modern-account">
                        <a href="#" class="modern-account-link">
                            <i class="far fa-user"></i>
                            <span>Account</span>
                            <span>⌄</span>
                        </a>

                        <div class="modern-dropdown modern-account-dropdown">

                            @role('admin')
                            <a href="{{ route('admin.index') }}">
                                Administration
                            </a>
                            @endrole

                            @auth
                                <a href="{{ route('user.dashboard') }}">
                                    Dashboard
                                </a>
                            @endauth

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('modern-logout-form').submit();">
                                Logout
                            </a>

                            <form id="modern-logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  style="display:none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                @endguest

                {{-- Cart --}}
                <div class="modern-cart">
                    <livewire:frontend.header.cart-component />
                </div>

                {{-- Mobile Button --}}
                <button type="button"
                        class="modern-mobile-button"
                        id="modern-mobile-button"
                        aria-label="Open menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>
    </div>

    {{-- Search Overlay --}}
    <div class="modern-search-panel" id="modern-search-panel">

        <div class="modern-search-inner">

            <div class="modern-search-label">
                SEARCH
            </div>

            <form action="{{ route('shop.index') }}" method="GET">
                <div class="modern-search-input-wrapper">
                    <i class="fas fa-search"></i>

                    <input
                            id="search"
                            name="keyword"
                            type="text"
                            value="{{ old('keyword', request()->keyword) }}"
                            placeholder="Search products..."
                            autocomplete="off"
                    >

                    <button type="button"
                            id="modern-search-close"
                            aria-label="Close search">
                        ×
                    </button>
                </div>
            </form>

        </div>

    </div>

    {{-- Mobile Navigation --}}
    <div class="modern-mobile-menu" id="modern-mobile-menu">

        <div class="modern-mobile-menu-header">
            <span>MENU</span>

            <button type="button"
                    id="modern-mobile-close"
                    aria-label="Close menu">
                ×
            </button>
        </div>

        <nav>

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('shop.index') }}">
                Shop
            </a>

            <div class="modern-mobile-section">
                <div class="modern-mobile-section-title">
                    Categories
                </div>

                @foreach($shop_categories_menu as $global_category)
                    <a href="{{ route('shop.index', $global_category->slug) }}">
                        {{ $global_category->name }}
                    </a>
                @endforeach
            </div>

            <a href="{{ route('contact.index') }}">
                Contact
            </a>

            @guest

                <a href="{{ route('login') }}">
                    Login
                </a>

                <a href="{{ route('register') }}">
                    Create Account
                </a>

            @else

                @role('admin')
                <a href="{{ route('admin.index') }}">
                    Administration
                </a>
                @endrole

                <a href="{{ route('user.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('modern-mobile-logout-form').submit();">
                    Logout
                </a>

                <form id="modern-mobile-logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      style="display:none;">
                    @csrf
                </form>

            @endguest

        </nav>

    </div>

</header>