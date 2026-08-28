<div class="modern-checkout">

    {{-- Coupon --}}
    @if(!session()->has('coupon'))
        <section class="checkout-card checkout-coupon-card">

            <div class="checkout-card-header">
                <span class="checkout-eyebrow">DISCOUNT</span>
                <h2>Have a coupon?</h2>
            </div>

            <form wire:submit.prevent="applyDiscount()" class="modern-coupon-form">
                <input
                        wire:model="couponCode"
                        type="text"
                        placeholder="Coupon code"
                        required
                >

                <button type="submit">
                    Apply Coupon
                </button>
            </form>

        </section>
    @endif


    <div class="checkout-grid">

        {{-- LEFT --}}
        <div class="checkout-details">

            {{-- Shipping Address --}}
            <section class="checkout-card">

                <div class="checkout-card-header">
                    <span class="checkout-eyebrow">01</span>
                    <h2>Shipping Address</h2>
                </div>

                @forelse($addresses as $address)

                    <label
                            for="address-{{ $address->id }}"
                            class="checkout-option
                        {{ intval($userAddressId) == $address->id ? 'is-selected' : '' }}"
                    >

                        <input
                                type="radio"
                                id="address-{{ $address->id }}"
                                name="shipping_address"
                                wire:model="userAddressId"
                                wire:click="getShippingCompanies()"
                                value="{{ $address->id }}"
                        >

                        <span class="checkout-radio"></span>

                        <span class="checkout-option-content">

                            <strong>
                                {{ $address->address_title }}
                            </strong>

                            <small>
                                {{ $address->address }}
                            </small>

                            <small>
                                {{ $address->country->name }}
                                -
                                {{ $address->state->name }}
                                -
                                {{ $address->city->name }}
                            </small>

                        </span>

                    </label>

                @empty

                    <div class="checkout-empty">
                        <p>No addresses found</p>

                        <a href="{{ route('user.addresses') }}">
                            Add Your Address
                        </a>
                    </div>

                @endforelse

            </section>


            {{-- Shipping Method --}}
            @if($userAddressId)

                <section class="checkout-card">

                    <div class="checkout-card-header">
                        <span class="checkout-eyebrow">02</span>
                        <h2>Shipping Method</h2>
                    </div>

                    <div class="checkout-options">

                        @forelse($shippingCompanies as $shippingCompany)

                            <label
                                    for="shipping-company-{{ $shippingCompany->id }}"
                                    class="checkout-option
                                {{ intval($shippingCompanyId) == $shippingCompany->id ? 'is-selected' : '' }}"
                            >

                                <input
                                        type="radio"
                                        id="shipping-company-{{ $shippingCompany->id }}"
                                        name="shipping_company"
                                        wire:model="shippingCompanyId"
                                        wire:click="storeShippingCost()"
                                        value="{{ $shippingCompany->id }}"
                                >

                                <span class="checkout-radio"></span>

                                <span class="checkout-option-content">

                                    <strong>
                                        {{ $shippingCompany->name }}
                                    </strong>

                                    <small>
                                        {{ $shippingCompany->description }}
                                    </small>

                                </span>

                                <span class="checkout-option-price">
                                    ${{ $shippingCompany->cost }}
                                </span>

                            </label>

                        @empty

                            <div class="checkout-empty">
                                <p>No shipping companies found</p>
                            </div>

                        @endforelse

                    </div>

                </section>

            @endif


            {{-- Payment --}}
            @if($userAddressId && $shippingCompanyId)

                <section class="checkout-card">

                    <div class="checkout-card-header">
                        <span class="checkout-eyebrow">03</span>
                        <h2>Payment Method</h2>
                    </div>

                    <div class="checkout-options">

                        @forelse($paymentMethods as $paymentMethod)

                            <label
                                    for="payment-method-{{ $paymentMethod->id }}"
                                    class="checkout-option
                                {{ intval($paymentMethodId) == $paymentMethod->id ? 'is-selected' : '' }}"
                            >

                                <input
                                        type="radio"
                                        id="payment-method-{{ $paymentMethod->id }}"
                                        name="payment_method"
                                        wire:model="paymentMethodId"
                                        wire:click="getPaymentMethod()"
                                        value="{{ $paymentMethod->id }}"
                                >

                                <span class="checkout-radio"></span>

                                <span class="checkout-option-content">

                                    <strong>
                                        {{ $paymentMethod->name }}
                                    </strong>

                                </span>

                            </label>

                        @empty

                            <div class="checkout-empty">
                                <p>No payment methods found</p>
                            </div>

                        @endforelse

                    </div>

                </section>

            @endif


            {{-- Place Order --}}
            @if($userAddressId && $shippingCompanyId && $paymentMethodId)

                <section class="checkout-place-order">

                    @if(\Str::lower($paymentMethodCode) == 'ppex')

                        <form action="{{ route('payment.store') }}" method="POST">
                            @csrf

                            <input
                                    type="hidden"
                                    name="userAddressId"
                                    value="{{ old('userAddressId', $userAddressId) }}"
                            >

                            <input
                                    type="hidden"
                                    name="shippingCompanyId"
                                    value="{{ old('shippingCompanyId', $shippingCompanyId) }}"
                            >

                            <input
                                    type="hidden"
                                    name="paymentMethodId"
                                    value="{{ old('paymentMethodId', $paymentMethodId) }}"
                            >

                            <button type="submit" class="checkout-submit">
                                <span>PayPal</span>
                                <span>Place Order</span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </button>

                        </form>

                    @endif


                    @if(\Str::lower($paymentMethodCode) == 'mada')

                        <form action="{{ route('checkout.charge_request') }}" method="GET">

                            @csrf

                            <input
                                    type="hidden"
                                    name="userAddressId"
                                    value="{{ old('userAddressId', $userAddressId) }}"
                            >

                            <input
                                    type="hidden"
                                    name="shippingCompanyId"
                                    value="{{ old('shippingCompanyId', $shippingCompanyId) }}"
                            >

                            <input
                                    type="hidden"
                                    name="paymentMethodId"
                                    value="{{ old('paymentMethodId', $paymentMethodId) }}"
                            >

                            <button type="submit" class="checkout-submit">

                                <span>Mada</span>
                                <span>Place Order</span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </button>

                        </form>

                    @endif

                </section>

            @endif

        </div>


        {{-- RIGHT --}}
        <aside class="checkout-summary">

            <div class="checkout-summary-inner">

                <div class="checkout-summary-header">

                    <span class="checkout-eyebrow">
                        ORDER SUMMARY
                    </span>

                    <h2>Your Order</h2>

                </div>


                <div class="checkout-summary-items">

                    <div class="checkout-summary-row">
                        <span>Subtotal</span>
                        <strong>${{ $cartSubTotal }}</strong>
                    </div>


                    @if(session()->has('coupon'))

                        <div class="checkout-summary-row checkout-discount">

                            <div>
                                <span>Discount</span>

                                <small>
                                    ({{ getNumbersOfCart()->get('discountCode') }})
                                </small>

                                <a
                                        wire:click.prevent="removeCoupon()"
                                        href="#"
                                >
                                    Remove coupon
                                </a>
                            </div>

                            <strong>
                                - ${{ $cartDiscount }}
                            </strong>

                        </div>

                    @endif


                    @if(session()->has('shipping'))

                        <div class="checkout-summary-row">

                            <div>
                                <span>Shipping</span>

                                <small>
                                    ({{ getNumbersOfCart()->get('shippingCode') }})
                                </small>
                            </div>

                            <strong>
                                ${{ $cartShipping }}
                            </strong>

                        </div>

                    @endif


                    <div class="checkout-summary-row">
                        <span>Tax</span>
                        <strong>${{ $cartTax }}</strong>
                    </div>

                </div>


                <div class="checkout-summary-total">

                    <span>Total</span>

                    <strong>
                        ${{ $cartTotal }}
                    </strong>

                </div>

            </div>

        </aside>

    </div>

</div>

