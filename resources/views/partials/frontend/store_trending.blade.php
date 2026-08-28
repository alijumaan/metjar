<section class="store-section store-trending">
    <div class="store-container">
        <div class="store-section-heading">
            <div>
                <span>
                    WHAT'S HOT
                </span>
                <h2>
                    Trending now
                </h2>
            </div>
            <a href="{{ route('shop.index') }}">
                VIEW ALL →
            </a>
        </div>

        <div class="store-trending-wrapper">
            <livewire:frontend.product.top-trending-products />
        </div>
    </div>
</section>