<section class="store-hero">

    {{-- Announcement bar --}}
    <div class="store-announcement">

        <div class="store-container store-announcement-inner">

            <span>
                {{ __('home.announcement.free_shipping') }}
            </span>


            @if($coupon)

                <a href="{{ route('shop.index') }}">

                    {{ $coupon->value }}
                    {{ $coupon->type == 'percentage' ? '%' : ' SAR' }}
                    {{ __('home.announcement.off') }}

                    <strong>
                        {{ $coupon->code }}
                    </strong>

                </a>

            @else

                <span class="announcement-desktop">
                    {{ __('home.announcement.new_season') }}
                </span>

            @endif


            <span class="announcement-desktop">
                {{ __('home.announcement.secure_checkout') }}
            </span>

        </div>

    </div>

    <div class="store-hero-glow"></div>

    <div class="store-container store-hero-inner">

        {{-- Copy --}}
        <div class="store-hero-copy">
            <div class="store-eyebrow">
                <span></span>
                {{ __('home.hero.eyebrow') }}
            </div>

            <h1>
                {{ __('home.hero.title') }}
                <em>
                    {{ __('home.hero.title_emphasis') }}
                </em>
                <br>
                <strong>
                    {{ __('home.hero.title_strong') }}
                </strong>
            </h1>
            <p>
                {{ __('home.hero.description') }}
            </p>
            <div class="store-hero-actions">
                <a
                        href="{{ route('shop.index') }}"
                        class="store-button store-button-dark"
                >
                    {{ __('home.hero.shop_now') }}
                    <span>→</span>
                </a>

                <a
                        href="#categories"
                        class="store-button-link"
                >
                    {{ __('home.hero.explore_categories') }}
                    <span>↓</span>
                </a>
            </div>
        </div>

        {{-- Products --}}
        @if(isset($heroProducts) && $heroProducts->count())
            <div class="store-hero-products">
                @foreach($heroProducts as $index => $product)
                    @if($product->firstMedia)
                        <a
                                href="javascript:void(0);"
                                class="store-hero-product hero-product-{{ $index + 1 }}"
                        >
                            <div class="hero-product-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="hero-product-image">
                                <img
                                        src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                        alt="{{ $product->name }}"
                                >
                            </div>

                            <div class="hero-product-info">
                                <small>
                                    {{ $product->category->name ?? __('home.hero.collection') }}
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
{{--    <div class="store-container">--}}
{{--        <div class="store-hero-categories">--}}
{{--            @foreach($shop_categories_menu->take(4) as $index => $category)--}}
{{--                <a href="{{ route('shop.index', $category->slug) }}">--}}
{{--                    <span>--}}
{{--                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}--}}
{{--                    </span>--}}
{{--                    <strong>--}}
{{--                        {{ $category->name }}--}}
{{--                    </strong>--}}
{{--                    <b>↗</b>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

</section>