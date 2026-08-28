@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

    <main class="modern-products-area checkout-page">

        <section class="store-section checkout-section">

            <div class="store-container">

                {{-- Checkout Header --}}
                <div class="store-section-heading shop-page-heading">

                    <div>
                        <span>CHECKOUT</span>
                        <h2>Complete Your Order</h2>
                    </div>

                </div>


                {{-- Success Message --}}
                <div
                        id="success"
                        style="display: none"
                        class="checkout-success"
                >
                    The purchase was completed successfully
                </div>


                {{-- Checkout --}}
                <livewire:frontend.checkout.checkout-component />

            </div>

        </section>

    </main>

@endsection
