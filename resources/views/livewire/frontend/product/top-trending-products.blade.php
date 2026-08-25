<div class="container">
    <div id="all-products" class="product-style-area pt-130 pb-30 wow fadeInUp">
    <div class="section-title-furits text-center mb-95">
        <img src="{{ asset('frontend/img/icon-img/49.png') }}" alt="">
        <h2>TOP TRENDING PRODUCTS</h2>
    </div>
    <div class="container">
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="product-fruit-wrapper mb-60">
                        <div class="product-fruit-img">
                            @if($product->firstMedia)
                                <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name ) }}"
                                     alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('img/cartwhite.png' ) }}" alt="">
                            @endif
                                <div class="product-furit-action">

                                    <a href="javascript:void(0)"
                                       wire:click.prevent="addToCart('{{ $product->id }}')"
                                       class="furit-animate-left metjar-icon"
                                       title="Add To Cart">

                                        <svg viewBox="0 0 24 24">
                                            <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 1.9-1.4L21 8H6"/>
                                            <circle cx="10" cy="20" r="1.5"/>
                                            <circle cx="18" cy="20" r="1.5"/>
                                        </svg>

                                    </a>

                                    <a href="javascript:void(0)"
                                       wire:click.prevent="addToWishList('{{ $product->id }}')"
                                       class="furit-animate-right metjar-icon"
                                       title="Wishlist">

                                        <svg viewBox="0 0 24 24">
                                            <path d="M20.8 8.7c0 5.5-8.8 10.3-8.8 10.3S3.2 14.2 3.2 8.7A4.7 4.7 0 0 1 12 6.1a4.7 4.7 0 0 1 8.8 2.6Z"/>
                                        </svg>

                                    </a>

                                </div>
                        </div>
                        <div class="product-fruit-content text-center">
                            <h4>
                                <a href="{{route('product.show', $product->slug)}}">{{ $product->name }}</a>
                            </h4>
                            <span>${{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>
    </div>
</div>
</div>
