@extends('layouts.app')

@section('title', 'Shop products')

@section('content')

    <main class="modern-products-area shop-page">

        <section class="store-section shop-section">

            <div class="store-container">

                {{-- Shop Header --}}
                <div class="store-section-heading shop-page-heading">
                    <div>
                        <span>SHOP</span>
                        <h2>All Products</h2>
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

                        <livewire:frontend.product.shop-products-component
                                :slug="$slug"
                        />

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection
