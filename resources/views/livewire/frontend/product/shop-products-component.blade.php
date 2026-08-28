<div class="modern-shop-products">
    {{-- =====================================================
         Shop Toolbar
         ===================================================== --}}

    <div class="modern-shop-toolbar">

        <div class="modern-shop-results">

            @if($products->total() > 0)
                Showing
                {{ $products->firstItem() }}
                -
                {{ $products->lastItem() }}
                of
                {{ $products->total() }}
                results
            @else
                No products found
            @endif

        </div>


        <div class="modern-shop-sort">

            <label for="shopSorting">
                Sort By
            </label>

            <select
                    id="shopSorting"
                    wire:model.live="sortingBy"
            >
                <option value="default">
                    Default sorting
                </option>

                <option value="popularity">
                    Popularity
                </option>

                <option value="low-high">
                    Price: Low to High
                </option>

                <option value="high-low">
                    Price: High to Low
                </option>
            </select>

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
                                title="Add To Cart"
                                aria-label="Add {{ $product->name }} to cart"
                        >

                            <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                            >
                                <path d="M4 5h2l1.5 10h9.8l2-7H7"></path>
                                <circle cx="10" cy="19" r="1.4"></circle>
                                <circle cx="17" cy="19" r="1.4"></circle>
                            </svg>

                        </button>


                        <button
                                type="button"
                                wire:click.prevent="addToWishList('{{ $product->id }}')"
                                class="modern-product-action wishlist-action"
                                title="Wishlist"
                                aria-label="Add {{ $product->name }} to wishlist"
                        >

                            <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                            >
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
                                aria-label="View {{ $product->name }}"
                                title="View Product"
                        >

                            <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                            >
                                <path d="M5 12h13"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>

                        </a>

                    </div>


                    {{-- Tags --}}

                    @if($product->tags->count() > 0)

                        <div class="modern-product-tags">

                            @foreach($product->tags as $tag)

                                <a
                                        href="{{ route('shop.tag', $tag->slug) }}"
                                >
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

                    <svg
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                    >
                        <path d="M6 8h12l1 12H5L6 8Z"></path>
                        <path d="M9 8a3 3 0 0 1 6 0"></path>
                    </svg>

                </div>

                <h3>
                    No products found
                </h3>

                <p>
                    Try changing your filters or search criteria.
                </p>

            </div>

        @endforelse

    </div>


    {{-- =====================================================
         Pagination
         ===================================================== --}}
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
