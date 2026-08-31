@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <main class="store-product-page">
        <div class="store-container">
            {{-- =====================================================
                 PRODUCT MAIN
                 ===================================================== --}}
            <div class="store-product-main">

                {{-- =================================================
                     GALLERY
                     ================================================= --}}

                <div class="store-product-gallery">

                    @if($product->media_count)

                        {{-- Main Image --}}
                        <div class="store-product-main-image">

                            @foreach($product->media as $media)

                                <div
                                        class="store-product-image-slide {{ $loop->first ? 'is-active' : '' }}"
                                        data-product-slide="{{ $loop->index }}"
                                >

                                    <a
                                            href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                            class="store-product-image-link"
                                    >

                                        <img
                                                src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                alt="{{ $product->name }}"
                                        >

                                    </a>

                                </div>

                            @endforeach

                        </div>


                        {{-- Thumbnails --}}
                        @if($product->media_count > 1)

                            <div class="store-product-thumbnails">

                                @foreach($product->media as $media)

                                    <button
                                            type="button"
                                            class="store-product-thumbnail {{ $loop->first ? 'is-active' : '' }}"
                                            data-product-thumbnail="{{ $loop->index }}"
                                            aria-label="View image {{ $loop->iteration }}"
                                    >

                                        <img
                                                src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                alt="{{ $product->name }}"
                                        >

                                    </button>

                                @endforeach

                            </div>

                        @endif

                    @else

                        <div class="store-product-main-image">

                            <div class="store-product-image-slide is-active">

                                <img
                                        src="{{ asset('img/no-img.png') }}"
                                        alt="{{ $product->name }}"
                                >

                            </div>

                        </div>

                    @endif

                </div>

                {{-- =================================================
                     PRODUCT INFO
                     ================================================= --}}
                <div class="store-product-info">

                    {{-- Category --}}
                    @if($product->category)

                        <a
                                href="{{ route('shop.index', $product->category->slug) }}"
                                class="store-product-category"
                        >
                            {{ $product->category->name }}
                        </a>

                    @endif


                    {{-- Title --}}
                    <h1 class="store-product-title">
                        {{ $product->name }}
                    </h1>


                    {{-- Rating --}}
                    <div class="store-product-rating">

                        <div class="store-product-stars">

                            @if($product->approved_reviews_avg_rating)

                                @for($i = 0; $i < 5; $i++)

                                    <span class="store-product-star">
                                        <i class="{{ round($product->approved_reviews_avg_rating) <= $i ? 'far' : 'fas' }} fa-star"></i>
                                    </span>

                                @endfor

                            @else

                                @for($i = 0; $i < 5; $i++)

                                    <span class="store-product-star">
                                        <i class="far fa-star"></i>
                                    </span>

                                @endfor

                            @endif

                        </div>

                        <span class="store-product-review-count">
                            {{ $product->approved_reviews_count }}
                            {{ $product->approved_reviews_count == 1 ? 'Review' : 'Reviews' }}
                        </span>

                    </div>


                    {{-- Price --}}
                    <div class="store-product-price">
                        ${{ number_format($product->price, 2) }}
                    </div>


                    {{-- Description --}}
                    @if($product->description)

                        <div class="store-product-description">
                            {{ $product->description }}
                        </div>

                    @endif


                    {{-- Cart --}}
                    <div class="store-product-cart">

                        <livewire:frontend.product.single-product-cart-component
                                :product="$product"
                        />

                    </div>


                    {{-- Meta --}}
                    <div class="store-product-meta">

                        {{-- Category --}}
                        @if($product->category)

                            <div class="store-product-meta-row">

                                <span class="store-product-meta-label">
                                    Category
                                </span>

                                <a
                                        href="{{ route('shop.index', $product->category->slug) }}"
                                        class="store-product-meta-value"
                                >
                                    {{ $product->category->name }}
                                </a>

                            </div>

                        @endif


                        {{-- Tags --}}
                        @if($product->tags->count())

                            <div class="store-product-meta-row">

                                <span class="store-product-meta-label">
                                    Tags
                                </span>

                                <div class="store-product-tags">

                                    @foreach($product->tags as $tag)

                                        <a
                                                href="{{ route('shop.tag', $tag->slug) }}"
                                                class="store-product-tag"
                                        >
                                            {{ $tag->name }}
                                        </a>

                                    @endforeach

                                </div>

                            </div>

                        @endif


                        {{-- Share --}}
                        <div class="store-product-meta-row">

                            <span class="store-product-meta-label">
                                Share
                            </span>

                            <div class="store-product-share">

                                @include('partials.frontend.shareBtn')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- =====================================================
                 DESCRIPTION / REVIEWS
                 ===================================================== --}}
            <div class="store-product-details">
                <div class="store-product-details-nav">
                    <button
                            type="button"
                            class="store-product-details-tab is-active"
                            data-product-tab="reviews"
                    >
                        Reviews
                        <span>
                            ({{ $product->approved_reviews_count }})
                        </span>
                    </button>
                    <button
                            type="button"
                            class="store-product-details-tab"
                            data-product-tab="description"
                    >
                        Description
                    </button>
                </div>

                {{-- Description --}}
                <div
                        class="store-product-details-panel"
                        data-product-panel="description"
                >
                    <div class="store-product-details-content">
                        {!! $product->details !!}
                    </div>
                </div>

                {{-- Reviews --}}
                <div
                        class="store-product-details-panel is-active"
                        data-product-panel="reviews"
                >
                    <div class="store-product-reviews">
                        <livewire:frontend.product.single-product-review-component
                                :product="$product"
                        />
                    </div>
                </div>
            </div>

        {{-- =========================================================
             RELATED PRODUCTS
             ========================================================= --}}

            <div class="store-product-related">
                <livewire:frontend.product.related-products-component
                        :relatedProducts="$relatedProducts"
                />
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /*
             * =========================================================
             * Product Gallery
             * =========================================================
             */

            const slides = document.querySelectorAll(
                '[data-product-slide]'
            );

            const thumbnails = document.querySelectorAll(
                '[data-product-thumbnail]'
            );

            if (slides.length && thumbnails.length) {

                thumbnails.forEach(function (thumbnail) {

                    thumbnail.addEventListener('click', function () {

                        const index = this.dataset.productThumbnail;

                        slides.forEach(function (slide) {
                            slide.classList.remove('is-active');
                        });

                        thumbnails.forEach(function (item) {
                            item.classList.remove('is-active');
                        });

                        const target = document.querySelector(
                            '[data-product-slide="' + index + '"]'
                        );

                        if (target) {
                            target.classList.add('is-active');
                        }

                        this.classList.add('is-active');

                    });

                });

            }


            /*
             * =========================================================
             * Product Tabs
             * =========================================================
             */

            const tabs = document.querySelectorAll(
                '[data-product-tab]'
            );

            const panels = document.querySelectorAll(
                '[data-product-panel]'
            );

            if (tabs.length && panels.length) {

                tabs.forEach(function (tab) {

                    tab.addEventListener('click', function () {

                        const target = this.dataset.productTab;

                        tabs.forEach(function (item) {
                            item.classList.remove('is-active');
                        });

                        panels.forEach(function (panel) {
                            panel.classList.remove('is-active');
                        });

                        this.classList.add('is-active');

                        const targetPanel = document.querySelector(
                            '[data-product-panel="' + target + '"]'
                        );

                        if (targetPanel) {
                            targetPanel.classList.add('is-active');
                        }

                    });

                });

            }

        });

    </script>
@endpush