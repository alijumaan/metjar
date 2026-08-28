<div
        x-data="{ showButton: @entangle('showButton') }"
        class="modern-checkout-button-wrapper"
>


    <a
            x-show="showButton"
            x-cloak
            href="{{ route('checkout.index') }}"
            class="modern-checkout-button"
    >

        <span>Proceed to Checkout</span>

        <svg
                viewBox="0 0 24 24"
                aria-hidden="true"
        >
            <path d="M5 12h13"></path>
            <path d="m13 6 6 6-6 6"></path>
        </svg>

    </a>


</div>
