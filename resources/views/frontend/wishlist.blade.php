@extends('layouts.app')

@section('title', __('wishlist.my_wishlist'))

@section('content')

    <main class="modern-wishlist-area">

        <section class="store-section wishlist-section">

            <div class="store-container">

                {{-- Header --}}
                <div class="store-section-heading wishlist-page-heading">
                    <div>
                        <span>{{ __('wishlist.wishlist') }}</span>
                        <h2>{{ __('wishlist.my_wishlist') }}</h2>
                    </div>

                    <a href="{{ route('shop.index') }}" class="wishlist-continue-link">
                        {{ __('wishlist.continue_shopping') }}

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M5 12h13"></path>
                            <path d="m13 6 6 6-6 6"></path>
                        </svg>
                    </a>
                </div>


                {{-- Wishlist --}}
                <div class="modern-wishlist-card">

                    <div class="modern-wishlist-table-wrap">

                        <table class="modern-wishlist-table">

                            <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('wishlist.product') }}</th>
                                <th>{{ __('wishlist.price') }}</th>
                                <th>{{ __('wishlist.move_to_cart') }}</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach(Cart::instance('wishlist')->content() as $item)

                                <livewire:frontend.wishlist.wishlist-item-component
                                        :item="$item->rowId"
                                        :key="$item->rowId"
                                />

                            @endforeach

                            <livewire:frontend.message.wishlist-not-found-component />

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection
