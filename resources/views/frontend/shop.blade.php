@extends('layouts.app')

@section('title', __('shop.shop') . ' - ' . __('shop.all_products'))

@section('content')

    <main class="modern-products-area shop-page">

        <section class="store-section shop-section">

            <div class="store-container">

                {{-- Shop Header --}}
                <div class="store-section-heading shop-page-heading">

                    <div>
                        <span>{{ __('shop.shop') }}</span>
                        <h2>{{ __('shop.all_products') }}</h2>
                    </div>

                </div>

                {{-- Products --}}
                <div class="shop-products">

                    <livewire:frontend.product.shop-products-component
                            :slug="$slug"
                    />

                </div>

            </div>

        </section>

    </main>

@endsection