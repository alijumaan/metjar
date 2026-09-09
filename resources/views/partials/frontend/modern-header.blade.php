<header class="store-header">

    {{-- Main navigation --}}
    <div class="store-header-main">

        <div class="store-container store-header-inner">

            {{-- Mobile menu --}}
            <button
                    type="button"
                    class="store-mobile-toggle"
                    id="storeMobileToggle"
                    aria-label="{{ app()->getLocale() === 'ar' ? 'فتح القائمة' : 'Open menu' }}">

                <span></span>
                <span></span>
                <span></span>
            </button>


            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="store-logo">

                <img
                        src="{{ asset('img/logo.png') }}"
                        alt="{{ config('app.name', 'Ali Shop') }}">

            </a>


            {{-- Navigation --}}
            <nav class="store-navigation">

                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    {{ __('general.home') }}
                </a>


                <a href="{{ route('shop.index') }}"
                   class="{{ request()->routeIs('shop.index') ? 'active' : '' }}">
                    {{ __('general.shop') }}
                </a>


                <div class="store-nav-dropdown">

                    <a href="{{ route('shop.index') }}">

                        {{ __('general.categories') }}

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
                    {{ __('general.contact') }}
                </a>

            </nav>


            {{-- Actions --}}
            <div class="store-actions">

                {{-- Search --}}
                <button
                        type="button"
                        class="store-action"
                        id="storeSearchButton"
                        aria-label="{{ __('general.search') }}">

                    <svg viewBox="0 0 24 24" aria-hidden="true">

                        <circle
                                cx="11"
                                cy="11"
                                r="6.5">
                        </circle>

                        <path d="M16 16L21 21"></path>

                    </svg>

                </button>


                {{-- Language --}}
                <div class="store-language">

                    @if(app()->getLocale() === 'ar')

                        <a
                                href="{{ route('language.switch', 'en') }}"
                                class="store-language-link"
                                aria-label="Switch to English">

                            EN

                        </a>

                    @else

                        <a
                                href="{{ route('language.switch', 'ar') }}"
                                class="store-language-link"
                                aria-label="التبديل إلى العربية">

                            AR

                        </a>

                    @endif

                </div>


                {{-- Account --}}
                @guest

                    {{-- Desktop --}}
                    <div class="store-auth-actions store-auth-desktop">

                        <a href="{{ route('login') }}"
                           class="store-auth-link">
                            {{ __('general.login') }}
                        </a>

                        <span class="store-auth-divider"></span>

                        <a href="{{ route('register') }}"
                           class="store-auth-link store-auth-register">
                            {{ __('general.register') }}
                        </a>

                    </div>

                    {{-- Mobile --}}
                    <a href="{{ route('login') }}"
                       class="store-action store-mobile-account"
                       aria-label="{{ __('general.login') }}">

                        <svg viewBox="0 0 24 24"
                             aria-hidden="true">

                            <circle cx="12" cy="8" r="3"></circle>

                            <path d="M5 20
                     C5.7 16.5 8 14.5 12 14.5
                     C16 14.5 18.3 16.5 19 20">
                            </path>

                        </svg>

                    </a>

                @else

                    <a
                            href="{{ route('user.dashboard') }}"
                            class="store-action"
                            aria-label="{{ __('general.account') }}">

                        <svg
                                class="store-account-icon"
                                viewBox="0 0 24 24"
                                aria-hidden="true">

                            <circle
                                    cx="12"
                                    cy="8"
                                    r="3.2">
                            </circle>

                            <path
                                    d="M4.8 20.5
                                   C5.5 16.6 8 14.6 12 14.6
                                   C16 14.6 18.5 16.6 19.2 20.5">
                            </path>

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
    <div
            class="store-search"
            id="storeSearch">

        <div class="store-container">

            <div class="store-search-label">

                {{ __('general.search_store') }}

            </div>


            <div class="store-search-input">

                <i class="fa-solid fa-magnifying-glass"></i>


                <input
                        id="search"
                        type="text"
                        autocomplete="off"
                        placeholder="{{ __('general.search_products') }}">


                <button
                        type="button"
                        id="storeSearchClose"
                        aria-label="{{ __('general.close_search') }}">

                    ×

                </button>

            </div>

        </div>

    </div>


    {{-- Mobile menu --}}
    <div
            class="store-mobile-menu"
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
                    aria-label="{{ app()->getLocale() === 'ar' ? 'إغلاق القائمة' : 'Close menu' }}">

                ×

            </button>

        </div>


        <nav>

            <a href="{{ route('home') }}">
                {{ __('general.home') }}
            </a>


            <a href="{{ route('shop.index') }}">
                {{ __('general.shop') }}
            </a>


            <div class="mobile-category-heading">

                {{ __('general.categories') }}

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
                {{ __('general.contact') }}
            </a>


            @guest

                <a href="{{ route('login') }}">
                    {{ __('general.login') }}
                </a>


                <a href="{{ route('register') }}">
                    {{ __('general.register') }}
                </a>

            @else

                <a href="{{ route('user.dashboard') }}">
                    {{ __('general.my_account') }}
                </a>

            @endguest


            {{-- Mobile language switcher --}}
            <div class="mobile-language-switcher">

                @if(app()->getLocale() === 'ar')

                    <a href="{{ route('language.switch', 'en') }}">
                        English
                    </a>

                @else

                    <a href="{{ route('language.switch', 'ar') }}">
                        العربية
                    </a>

                @endif

            </div>

        </nav>

    </div>

</header>