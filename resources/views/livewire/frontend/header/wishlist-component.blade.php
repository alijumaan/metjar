<div class="store-wishlist">

    <a href="{{ route('wishlist.index') }}"
       class="store-action store-wishlist-action"
       aria-label="Wishlist">

        <svg
                width="19"
                height="19"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
        >
            <path
                    d="M20.84 4.61C19.73 3.5 18.22 2.88 16.64 2.88C15.06 2.88 13.55 3.5 12.44 4.61L12 5.05L11.56 4.61C9.24 2.29 5.48 2.29 3.16 4.61C.84 6.93.84 10.69 3.16 13.01L12 21.85L20.84 13.01C23.16 10.69 23.16 6.93 20.84 4.61Z"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
        </svg>

        @if($wishlistCount > 0)
            <span class="store-badge">
                {{ $wishlistCount }}
            </span>
        @endif

    </a>

</div>


