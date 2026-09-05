<div class="store-sidebar shop-filter-content">

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

                    <a
                            href="{{ route('shop.index', $category->slug) }}"
                            class="store-sidebar-category-main"
                    >

                        <span>{{ $category->name }}</span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M9 6l6 6-6 6"/>
                        </svg>

                    </a>


                    @if($category->appearedChildren->count())

                        <div class="store-sidebar-subcategories">

                            @foreach($category->appearedChildren as $sub_category)

                                <a
                                        href="{{ route('shop.index', $sub_category->slug) }}"
                                >
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

                <a
                        href="{{ route('shop.tag', $tag->slug) }}"
                        class="store-sidebar-tag"
                >

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

</div>