<section class="store-hero">

    {{-- Announcement bar --}}
    <div class="store-announcement">
        <div class="store-container store-announcement-inner">
            <span>
                FREE SHIPPING ON ORDERS OVER 250 SAR
            </span>
            @if($coupon)
                <a href="{{ route('shop.index') }}">
                    {{ $coupon->value }}
                    {{ $coupon->type == 'percentage' ? '%' : ' SAR' }}
                    OFF
                    <strong>{{ $coupon->code }}</strong>
                </a>
            @else
                <span class="announcement-desktop">
                    NEW SEASON · NEW ESSENTIALS
                </span>
            @endif
            <span class="announcement-desktop">
                SECURE CHECKOUT
            </span>
        </div>
    </div>

    <div class="store-hero-glow"></div>

    <div class="store-container store-hero-inner">


        {{-- Copy --}}
        <div class="store-hero-copy">

            <div class="store-eyebrow">

                <span></span>

                THE NEW COLLECTION · 2026

            </div>


            <h1>

                Everything
                <em>you want.</em>

                <br>

                <strong>One place.</strong>

            </h1>


            <p>
                Discover electronics, fashion, watches and footwear
                selected for the way you live.
            </p>


            <div class="store-hero-actions">

                <a href="{{ route('shop.index') }}"
                   class="store-button store-button-dark">

                    SHOP NOW

                    <span>→</span>

                </a>

                <a href="#categories"
                   class="store-button-link">

                    EXPLORE CATEGORIES

                    <span>↓</span>

                </a>
            </div>
        </div>

        {{-- Products --}}
        @if(isset($heroProducts) && $heroProducts->count())
            <div class="store-hero-products">
                @foreach($heroProducts as $index => $product)
                    @if($product->firstMedia)
                        <a href="javascript:void(0);" class="store-hero-product hero-product-{{ $index + 1 }}">

                            <div class="hero-product-number">

                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                            </div>

                            <div class="hero-product-image">
                                <img
                                        src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                        alt="{{ $product->name }}">
                            </div>

                            <div class="hero-product-info">
                                <small>
                                    {{ $product->category->name ?? 'Collection' }}
                                </small>

                                <strong>
                                    {{ $product->name }}
                                </strong>

                                <span>
                                    {{ number_format($product->price, 2) }}
                                    SAR
                                </span>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>


    {{-- Quick categories --}}
    <div class="store-container">

        <div class="store-hero-categories">

            @foreach($shop_categories_menu->take(4) as $index => $category)

                <a href="{{ route('shop.index', $category->slug) }}">

                    <span>
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    <strong>
                        {{ $category->name }}
                    </strong>

                    <b>↗</b>

                </a>

            @endforeach

        </div>

    </div>

</section>