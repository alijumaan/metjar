<footer class="luxury-footer">

    <div class="container">

        <div class="luxury-footer-main">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="luxury-footer-logo">
                Online Shop
            </a>

            {{-- Links --}}
            <nav class="luxury-footer-links">

                <a href="{{ url('/') }}">
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

                <a href="#" aria-label="Instagram">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1"/>
                    </svg>
                </a>

                <a href="#" aria-label="Facebook">
                    <svg viewBox="0 0 24 24">
                        <path d="M14 8h3V4h-3c-3.3 0-5 1.7-5 5v3H6v4h3v4h4v-4h3l1-4h-4V9c0-.7.3-1 1-1Z"/>
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