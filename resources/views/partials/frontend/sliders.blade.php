<section class="modern-hero">

    <div class="modern-hero-background"></div>

    <div class="modern-hero-content">

        {{-- Hero Copy --}}
        <div class="modern-hero-copy">

            <span class="modern-hero-eyebrow">
                THE NEW WAY TO SHOP
            </span>

            <h1>
                Everything
                <span>you want.</span>
                <br>
                One place.
            </h1>

            <p>
                Discover electronics, fashion, watches
                and footwear — all in one place.
            </p>

            <div class="modern-hero-actions">

                <a href="{{ route('shop.index') }}"
                   class="modern-button modern-button-dark">
                    SHOP NOW
                    <span>→</span>
                </a>

                <a href="#categories"
                   class="modern-button modern-button-link">
                    EXPLORE CATEGORIES
                    <span>↓</span>
                </a>

            </div>

        </div>


        {{-- Real Products --}}
        @if($heroProducts->isNotEmpty())

            <div class="modern-hero-products">

                @foreach($heroProducts as $index => $product)
                    <a href="{{ route('product.show', $product->slug) }}"
                       class="modern-hero-product modern-hero-product-{{ $index + 1 }}">
                        <span>
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <div class="modern-hero-product-image">
                            <img
                                    src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                    alt="{{ $product->name }}"
                            >
                        </div>
                        <div class="modern-hero-product-info">
                            <small>
                                {{ $product->category->name ?? 'Collection' }}
                            </small>
                            <strong>
                                {{ $product->name }}
                            </strong>
                            <span>
                                {{ number_format($product->price, 2) }} SAR
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>