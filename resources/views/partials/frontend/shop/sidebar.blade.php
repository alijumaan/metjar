<div class="store-sidebar">

    {{-- =====================================================
         CATEGORIES
         ===================================================== --}}
    <div class="store-sidebar-widget">

        <div class="store-sidebar-heading">
            <span>SHOP</span>
            <h3>Categories</h3>
        </div>

        <div class="store-sidebar-categories">

            @forelse($shop_categories_menu as $category)

                <div class="store-sidebar-category">

                    <a href="{{ route('shop.index', $category->slug) }}"
                       class="store-sidebar-category-main">

                        <span>{{ $category->name }}</span>

                        <svg viewBox="0 0 24 24"
                             aria-hidden="true">
                            <path d="M9 6l6 6-6 6"/>
                        </svg>

                    </a>

                    @if($category->appearedChildren->count())

                        <div class="store-sidebar-subcategories">

                            @foreach($category->appearedChildren as $sub_category)

                                <a href="{{ route('shop.index', $sub_category->slug) }}">
                                    {{ $sub_category->name }}
                                </a>

                            @endforeach

                        </div>

                    @endif

                </div>

            @empty

                <p class="store-sidebar-empty">
                    No categories found.
                </p>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         TAGS
         ===================================================== --}}
    <div class="store-sidebar-widget">

        <div class="store-sidebar-heading">
            <span>EXPLORE</span>
            <h3>Tags</h3>
        </div>

        <div class="store-sidebar-tags">

            @forelse($shop_tags_menu as $tag)

                <a href="{{ route('shop.tag', $tag->slug) }}"
                   class="store-sidebar-tag">

                    <span>{{ $tag->name }}</span>

                    <small>{{ $tag->products_count }}</small>

                </a>

            @empty

                <p class="store-sidebar-empty">
                    No tags found.
                </p>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         RECENT REVIEWS
         ===================================================== --}}
    <div class="store-sidebar-widget">

        <div class="store-sidebar-heading">
            <span>COMMUNITY</span>
            <h3>Recent Reviews</h3>
        </div>

        <div class="store-sidebar-reviews">

            @forelse($recent_reviews as $recent_review)

                <div class="store-sidebar-review">

                    <div class="store-sidebar-review-avatar">

                        <img
                                src="{{ get_gravatar($recent_review->email, 50) }}"
                                alt="{{ $recent_review->name }}"
                        >

                    </div>

                    <div class="store-sidebar-review-content">

                        @if(isset($recent_review->product->slug))

                            <div class="store-sidebar-review-meta">

                                <strong>
                                    {{ $recent_review->user->full_name ?? $recent_review->name }}
                                </strong>

                                <span>
                                    reviewed
                                </span>

                            </div>

                            <a
                                    href="{{ route('product.show', $recent_review->product->slug) }}"
                                    class="store-sidebar-review-product"
                            >
                                {{ $recent_review->product->name }}
                            </a>

                        @else

                            <div class="store-sidebar-review-meta">

                                <strong>
                                    {{ $recent_review->name }}
                                </strong>

                                <span>
                                    review
                                </span>

                            </div>

                        @endif

                        <p>
                            {!! \Illuminate\Support\Str::limit(
                                $recent_review->review,
                                65,
                                '...'
                            ) !!}
                        </p>

                    </div>

                </div>

            @empty

                <p class="store-sidebar-empty">
                    No reviews found.
                </p>

            @endforelse

        </div>

    </div>

</div>
