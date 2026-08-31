<div class="product-area pb-95">
    <div class="container">

        <div class="store-section-heading">
            <div>
                <span>YOU MAY ALSO LIKE</span>
                <h2>Related Products</h2>
            </div>

            <a href="{{ route('shop.index') }}">
                VIEW ALL →
            </a>
        </div>

        <div class="row">

            @forelse($relatedProducts as $product)

                <div class="col-lg-3 col-sm-6">

                    <div class="product-fruit-wrapper mb-60">

                        <div class="product-fruit-img">

                            @if($product->firstMedia)

                                <img
                                        src="{{ asset('storage/images/products/' . $product->firstMedia->file_name ) }}"
                                        alt="{{ $product->name }}">

                            @else

                                <img
                                        src="{{ asset('img/no-img.png' ) }}"
                                        alt="">

                            @endif


                            <div class="product-furit-action">

                                <a
                                        href="javascript:void(0)"
                                        wire:click.prevent="addToCart('{{ $product->id }}')"
                                        class="furit-animate-left metjar-icon product-action-cart"
                                        title="Add To Cart">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 1.9-1.4L21 8H6"/>
                                        <circle cx="10" cy="20" r="1.5"/>
                                        <circle cx="18" cy="20" r="1.5"/>
                                    </svg>

                                    <span>Add to cart</span>

                                </a>


                                <a
                                        href="javascript:void(0)"
                                        wire:click.prevent="addToWishList('{{ $product->id }}')"
                                        class="furit-animate-right metjar-icon product-action-wishlist"
                                        title="Wishlist">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M20.8 8.7c0 5.5-8.8 10.3-8.8 10.3S3.2 14.2 3.2 8.7A4.7 4.7 0 0 1 12 6.1a4.7 4.7 0 0 1 8.8 2.6Z"/>
                                    </svg>

                                </a>

                            </div>

                        </div>


                        <div class="product-fruit-content mt-2">

                            <h4>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h4>

                            <span>
                                ${{ $product->price }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <p>No products found.</p>

            @endforelse

        </div>

    </div>
</div>