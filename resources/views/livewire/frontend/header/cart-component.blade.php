<div class="store-cart">

    <a href="{{ route('cart.index') }}"
       class="store-action store-cart-action"
       aria-label="Shopping Cart">

        <svg
                width="19"
                height="19"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
        >
            <path
                    d="M6.5 8.5H17.5L19 21H5L6.5 8.5Z"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linejoin="round"
            />

            <path
                    d="M9 9V6.5C9 4.84 10.34 3.5 12 3.5C13.66 3.5 15 4.84 15 6.5V9"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
            />
        </svg>

        @if($cartCount > 0)
            <span class="store-badge">
                {{ $cartCount }}
            </span>
        @endif

    </a>

</div>