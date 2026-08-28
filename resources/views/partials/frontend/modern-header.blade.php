<header class="store-header">

    {{-- Main navigation --}}
    <div class="store-header-main">

        <div class="store-container store-header-inner">
            {{-- Mobile menu --}}
            <button
                    type="button"
                    class="store-mobile-toggle"
                    id="storeMobileToggle"
                    aria-label="Open menu">

                <span></span>
                <span></span>
                <span></span>
            </button>


            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="store-logo">
                <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'Ali Shop') }}">
            </a>


            {{-- Navigation --}}
            <nav class="store-navigation">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('shop.index') }}"
                   class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
                    Shop
                </a>

                <div class="store-nav-dropdown">
                    <a href="{{ route('shop.index') }}">
                        Categories
                        <span class="nav-arrow">⌄</span>
                    </a>

                    <div class="store-dropdown">
                        @foreach($shop_categories_menu as $category)
                            <a href="{{ route('shop.index', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('contact.index') }}">
                    Contact
                </a>
            </nav>


            {{-- Actions --}}
            <div class="store-actions">
                {{-- Search --}}
                <button
                        type="button"
                        class="store-action"
                        id="storeSearchButton"
                        aria-label="Search">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="11" cy="11" r="6.5"></circle>
                        <path d="M16 16L21 21"></path>
                    </svg>
                </button>


                {{-- Account --}}
                @guest
                    <a href="{{ route('login') }}" class="store-action store-account-action mx-3" aria-label="Account">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="store-action store-account-action mx-3" aria-label="Account">
                        Register
                    </a>
                @else

                    <a href="{{ route('user.dashboard') }}"
                       class="store-action store-account-action"
                       aria-label="Account">

                        <svg class="store-account-icon"
                             viewBox="0 0 24 24"
                             aria-hidden="true">

                            <circle cx="12" cy="8" r="3.2"></circle>

                            <path d="M4.8 20.5
                     C5.5 16.6 8 14.6 12 14.6
                     C16 14.6 18.5 16.6 19.2 20.5"></path>

                        </svg>

                    </a>

                @endguest

                {{-- Wishlist --}}
                <div class="store-wishlist">
                    <livewire:frontend.header.wishlist-component />
                </div>

                {{-- Cart --}}
                <div class="store-cart">
                    <livewire:frontend.header.cart-component />
                </div>
            </div>

        </div>
    </div>


    {{-- Search panel --}}
    <div class="store-search"
         id="storeSearch">

        <div class="store-container">

            <div class="store-search-label">
                SEARCH STORE
            </div>

            <div class="store-search-input">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                        id="search"
                        type="text"
                        autocomplete="off"
                        placeholder="Search products...">

                <button
                        type="button"
                        id="storeSearchClose"
                        aria-label="Close search">

                    ×

                </button>

            </div>

        </div>

    </div>


    {{-- Mobile menu --}}
    <div class="store-mobile-menu"
         id="storeMobileMenu">

        <div class="store-mobile-header">

            <a href="{{ route('home') }}">

                <img
                        src="{{ asset('img/logo.png') }}"
                        alt="{{ config('app.name', 'Ali Shop') }}">

            </a>

            <button
                    type="button"
                    id="storeMobileClose"
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


            <div class="mobile-category-heading">
                Categories
            </div>

            @foreach($shop_categories_menu as $category)

                <a
                        class="mobile-category"
                        href="{{ route('shop.index', $category->slug) }}">

                    {{ $category->name }}

                    <span>→</span>

                </a>

            @endforeach


            <a href="{{ route('contact.index') }}">
                Contact
            </a>


            @guest

                <a href="{{ route('login') }}">
                    Login
                </a>

            @else

                <a href="{{ route('user.dashboard') }}">
                    My Account
                </a>

            @endguest

        </nav>

    </div>

</header>