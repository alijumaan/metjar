@extends('layouts.app')

@section('title', 'Cart')

@section('content')


    <main class="modern-cart-area">

        <section class="store-section cart-section">

            <div class="store-container">

                {{-- Header --}}
                <div class="store-section-heading cart-page-heading">

                    <div>
                        <span>SHOPPING CART</span>
                        <h2>Your Cart</h2>
                    </div>

                    <a href="{{ route('shop.index') }}" class="cart-continue-link">

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 12H5"></path>
                            <path d="m11 18-6-6 6-6"></path>
                        </svg>

                        Continue Shopping

                    </a>

                </div>


                {{-- Cart Items --}}
                <div class="modern-cart-card">

                    <div class="modern-cart-table-wrap">

                        <table class="modern-cart-table">

                            <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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

                    <a
                            href="{{ route('shop.index') }}"
                            class="modern-cart-back"
                    >
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 12H5"></path>
                            <path d="m11 18-6-6 6-6"></path>
                        </svg>

                        Continue Shopping
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
