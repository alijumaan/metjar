@extends('layouts.app')

@section('title', __('shop_tag.tag_title', ['tag' => $slug]))

@section('content')

    <main class="modern-products-area shop-page">

        <section class="store-section shop-section">

            <div class="store-container">

                {{-- Shop Header --}}
                <div class="store-section-heading shop-page-heading">

                    <div>
                        <span>{{ __('shop_tag.shop') }}</span>
                        <h2 class="shop-tag-title">{{ $slug }}</h2>
                    </div>

                </div>

                {{-- Shop Layout --}}
                <div class="shop-layout">

                    {{-- Sidebar --}}
                    <aside class="shop-sidebar">
                        @include('partials.frontend.shop.sidebar')
                    </aside>

                    {{-- Products --}}
                    <div class="shop-products">
                        <livewire:frontend.product.shop-products-tag-component
                                :slug="$slug"
                        />
                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection
