@extends('layouts.app')

@section('title', __('cart.your_cart'))

@section('content')

    <main class="modern-cart-area">

        <section class="store-section cart-section">

            <div class="store-container">

                {{-- Header --}}
                <div class="store-section-heading cart-page-heading">

                    <div>
                        <span>{{ __('cart.shopping_cart') }}</span>
                        <h2>{{ __('cart.your_cart') }}</h2>
                    </div>

                    <a href="{{ route('shop.index') }}" class="cart-continue-link">

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 12H5"></path>
                            <path d="m11 18-6-6 6-6"></path>
                        </svg>

                        {{ __('cart.continue_shopping') }}

                    </a>

                </div>


                {{-- Cart Items --}}
                <div class="modern-cart-card">

                    <div class="modern-cart-table-wrap">

                        <table class="modern-cart-table">

                            <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('cart.product') }}</th>
                                <th>{{ __('cart.price') }}</th>
                                <th>{{ __('cart.quantity') }}</th>
                                <th>{{ __('cart.total') }}</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach(Cart::instance('default')->content() as $item)

                                <livewire:frontend.cart.cart-item-component
                                        :item="$item->rowId"
                                        :key="$item->rowId"
                                />

                            @endforeach

                            <livewire:frontend.message.cart-not-found-component />

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- Cart Total --}}
                <div class="modern-cart-bottom">

                    <div class="modern-cart-total-wrapper">

                        <livewire:frontend.cart.cart-total-component />

                    </div>

                </div>


                {{-- Actions --}}
                <div class="modern-cart-actions">

                    <a href="{{ route('shop.index') }}" class="modern-cart-back">

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 12H5"></path>
                            <path d="m11 18-6-6 6-6"></path>
                        </svg>

                        {{ __('cart.continue_shopping') }}

                    </a>

                    @if(Cart::instance('default')->count())

                        <div class="modern-cart-checkout">
                            <livewire:frontend.button.proceed-checkout-button-component />
                        </div>

                    @endif

                </div>

            </div>

        </section>

    </main>

@endsection
