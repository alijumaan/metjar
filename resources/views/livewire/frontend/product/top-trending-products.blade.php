<div class="container">
    <div id="all-products" class="modern-products-area pt-130 pb-30 wow fadeInUp">

        <div class="section-title-furits text-center mb-95">
            <img src="{{ asset('frontend/img/icon-img/49.png') }}" alt="">
            <h2>TOP TRENDING PRODUCTS</h2>
        </div>

        <div class="container">
            <div class="row g-4">

                @forelse($products as $product)

                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">

                        <div class="modern-product-card">

                            {{-- Product Image --}}
                            <div class="modern-product-image">

                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="modern-product-image-link">

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

                                {{-- Floating Actions --}}
                                <div class="modern-product-actions">

                                    <button
                                            type="button"
                                            wire:click.prevent="addToWishList('{{ $product->id }}')"
                                            class="modern-product-action wishlist-action"
                                            title="Add to Wishlist"
                                            aria-label="Add to Wishlist"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M20.8 8.7c0 5.5-8.8 10.3-8.8 10.3S3.2 14.2 3.2 8.7A4.7 4.7 0 0 1 12 6.1a4.7 4.7 0 0 1 8.8 2.6Z"/>
                                        </svg>
                                    </button>

                                    <button
                                            type="button"
                                            wire:click.prevent="addToCart('{{ $product->id }}')"
                                            class="modern-product-action cart-action"
                                            title="Add to Cart"
                                            aria-label="Add to Cart"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 1.9-1.4L21 8H6"/>
                                            <circle cx="10" cy="20" r="1.5"/>
                                            <circle cx="18" cy="20" r="1.5"/>
                                        </svg>
                                    </button>

                                </div>

                            </div>

                            {{-- Product Info --}}
                            <div class="modern-product-content">

                                <h3 class="modern-product-title">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                <div class="modern-product-bottom">

                                    <span class="modern-product-price">
                                        ${{ number_format($product->price, 2) }}
                                    </span>

                                    <a
                                            href="{{ route('product.show', $product->slug) }}"
                                            class="modern-product-view"
                                            aria-label="View Product"
                                    >
                                        <svg viewBox="0 0 24 24">
                                            <path d="M5 12h14"/>
                                            <path d="m13 6 6 6-6 6"/>
                                        </svg>
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <div class="modern-products-empty">
                            <p>No products found.</p>
                        </div>
                    </div>

                @endforelse

            </div>
        </div>

    </div>
</div>