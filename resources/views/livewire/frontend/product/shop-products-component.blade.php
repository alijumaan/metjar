<div class="modern-shop-products">

    {{-- =====================================================
     Shop Toolbar
     ===================================================== --}}

    <div class="modern-shop-toolbar">

        {{-- Results --}}
        <div class="modern-shop-results">

            @if($products->total() > 0)

                {{ __('shop.showing_results', [
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem(),
                    'total' => $products->total()
                ]) }}

            @else

                {{ __('shop.no_products') }}

            @endif

        </div>

        {{-- Controls --}}
        <div class="modern-shop-controls">

            {{-- Clear Filters --}}
            <a
                    href="{{ route('shop.index') }}"
                    class="modern-shop-clear"
            >
                {{ __('shop.clear_filters') }}
            </a>

            {{-- Filter By --}}
            <div class="modern-shop-filter">

                <button
                        type="button"
                        class="modern-shop-control"
                        onclick="this.closest('.modern-shop-filter').classList.toggle('is-open')"
                >

                    <span>{{ __('shop.filter_by') }}</span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>

                </button>

                <div class="modern-shop-filter-menu">
                    @include('partials.frontend.shop.sidebar')
                </div>

            </div>

            {{-- Sort By --}}
            <div class="modern-shop-sort">

                <label for="shopSorting">
                    {{ __('shop.sort_by') }}
                </label>

                <select
                        id="shopSorting"
                        wire:model.live="sortingBy"
                >

                    <option value="default">
                        {{ __('shop.default_sorting') }}
                    </option>

                    <option value="popularity">
                        {{ __('shop.popularity') }}
                    </option>

                    <option value="low-high">
                        {{ __('shop.price_low_high') }}
                    </option>

                    <option value="high-low">
                        {{ __('shop.price_high_low') }}
                    </option>

                </select>

            </div>

        </div>

    </div>

    {{-- =====================================================
         Products Grid
     ===================================================== --}}

    <div class="modern-products-grid">

        @forelse($products as $product)

            <article
                    class="modern-product-card"
                    wire:key="product-{{ $product->id }}"
            >

                {{-- Product Image --}}
                <div class="modern-product-image">

                    <a
                            href="{{ route('product.show', $product->slug) }}"
                            class="modern-product-image-link"
                    >

                        @if($product->firstMedia)

                            <img
                                    src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                            >

                        @else

                            <img
                                    src="{{ asset('img/cartwhite.png') }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                            >

                        @endif

                    </a>

                    {{-- Product Actions --}}
                    <div class="modern-product-actions">

                        <button
                                type="button"
                                wire:click.prevent="addToCart('{{ $product->id }}')"
                                class="modern-product-action cart-action"
                                title="{{ __('shop.add_to_cart') }}"
                                aria-label="{{ __('shop.add_to_cart') }}: {{ $product->name }}"
                        >

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M4 5h2l1.5 10h9.8l2-7H7"></path>
                                <circle cx="10" cy="19" r="1.4"></circle>
                                <circle cx="17" cy="19" r="1.4"></circle>
                            </svg>

                        </button>

                        <button
                                type="button"
                                wire:click.prevent="addToWishList('{{ $product->id }}')"
                                class="modern-product-action wishlist-action"
                                title="{{ __('shop.wishlist') }}"
                                aria-label="{{ __('shop.wishlist') }}: {{ $product->name }}"
                        >

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.8 8.8c0 5.2-8.8 10-8.8 10s-8.8-4.8-8.8-10A4.8 4.8 0 0 1 8 4c1.4 0 2.9.7 4 2 1.1-1.3 2.6-2 4-2a4.8 4.8 0 0 1 4.8 4.8Z"></path>
                            </svg>

                        </button>

                    </div>

                </div>

                {{-- Product Content --}}
                <div class="modern-product-content">

                    <h3 class="modern-product-title">
                        <a href="{{ route('product.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </h3>

                    <div class="modern-product-bottom">

                        <span class="modern-product-price">
                            ${{ $product->price }}
                        </span>

                        <a
                                href="{{ route('product.show', $product->slug) }}"
                                class="modern-product-view"
                                aria-label="{{ __('shop.view_product') }}: {{ $product->name }}"
                                title="{{ __('shop.view_product') }}"
                        >

                            <svg class="arrow-icon" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 12h13"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>

                        </a>

                    </div>

                    {{-- Tags --}}
                    @if($product->tags->count() > 0)

                        <div class="modern-product-tags">

                            @foreach($product->tags as $tag)

                                <a href="{{ route('shop.tag', $tag->slug) }}">
                                    {{ $tag->name }}
                                </a>

                                @if(!$loop->last)
                                    <span>,</span>
                                @endif

                            @endforeach

                        </div>

                    @endif

                </div>

            </article>

        @empty

            <div class="modern-products-empty">

                <div class="modern-products-empty-icon">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6 8h12l1 12H5L6 8Z"></path>
                        <path d="M9 8a3 3 0 0 1 6 0"></path>
                    </svg>

                </div>

                <h3>{{ __('shop.no_products') }}</h3>

                <p>{{ __('shop.no_products_message') }}</p>

            </div>

        @endforelse

    </div>

    {{-- Pagination --}}
    @if($products->hasPages())
        <div class="modern-shop-pagination">
            {!! $products
                ->appends(request()->all())
                ->onEachSide(1)
                ->links()
            !!}
        </div>
    @endif

</div>