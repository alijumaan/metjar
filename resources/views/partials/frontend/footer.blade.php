<footer class="luxury-footer">

    <div class="container">

        <div class="luxury-footer-main">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="luxury-footer-logo">
                Online Shop
            </a>

            {{-- Links --}}
            <nav class="luxury-footer-links">

                <a href="{{ route('shop.index') }}">
                    Shop
                </a>

                <a href="{{ route('cart.index') }}">
                    Cart
                </a>

                <a href="{{ route('user.dashboard') }}">
                    Account
                </a>

                <a href="{{ route('contact.index') }}">
                    Contact
                </a>

                <a href="{{ route('page.show', 'privacy-policy') }}">
                    Privacy
                </a>

            </nav>

            {{-- Social --}}
            <div class="luxury-footer-social">

                <a href="https://www.instagram.com/alhbbash" target="_blank" aria-label="Instagram">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1"/>
                    </svg>
                </a>

                <a href="https://x.com/alila_q" target="_blank" aria-label="X">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M18.244 2H21.5l-7.11 8.13L22.76 22h-6.65l-5.21-6.81L4.94 22H1.68l7.61-8.7L1.24 2H8.06l4.71 6.23L18.244 2Zm-1.17 17.86h1.8L6.95 4.02H5.02l12.05 15.84Z"/>
                    </svg>
                </a>

                <a href="mailto:alila3883@gmail.com"
                   aria-label="Email">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="m3 7 9 6 9-6"/>
                    </svg>
                </a>

            </div>

        </div>

        <div class="luxury-footer-bottom">

            <span>
                © {{ date('Y') }} Online Shop
            </span>

            <span class="luxury-footer-line"></span>

            <a href="https://alialqahtani.sa"
               target="_blank"
               rel="noopener">
                alialqahtani.sa
            </a>

        </div>

    </div>

</footer>