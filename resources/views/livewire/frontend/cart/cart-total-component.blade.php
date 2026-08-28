
<div class="modern-cart-total-wrapper">

    @if($cartTotal != 0)

        <div class="modern-cart-total-card">

            <div class="modern-cart-total-header">
                <span>CART</span>
                <h2>Cart totals</h2>
            </div>

            <div class="modern-cart-total-list">

                <div class="modern-cart-total-row">
                    <span>Subtotal</span>
                    <strong>${{ $cartSubTotal }}</strong>
                </div>

                @if(session()->has('coupon'))
                    <div class="modern-cart-total-row">
                        <span>
                            Discount
                            <small>
                                ({{ getNumbersOfCart()->get('discountCode') }})
                            </small>
                        </span>

                        <strong>${{ $cartDiscount }}</strong>
                    </div>
                @endif

                @if(session()->has('shipping'))
                    <div class="modern-cart-total-row">
                        <span>
                            Shipping
                            <small>
                                ({{ getNumbersOfCart()->get('shippingCode') }})
                            </small>
                        </span>

                        <strong>${{ $cartShipping }}</strong>
                    </div>
                @endif

                <div class="modern-cart-total-row">
                    <span>
                        Tax
                        <small>(5%)</small>
                    </span>

                    <strong>${{ $cartTax }}</strong>
                </div>

                <div class="modern-cart-total-row modern-cart-grand-total">
                    <span>Total</span>
                    <strong>${{ $cartTotal }}</strong>
                </div>

            </div>


            {{-- Coupon --}}
            <div class="modern-cart-coupon">

                @if(!session()->has('coupon'))

                    <form wire:submit.prevent="applyDiscount">

                        <input
                                type="text"
                                wire:model="couponCode"
                                placeholder="Coupon code"
                                required
                        >

                        <button type="submit">
                            Apply coupon
                        </button>

                    </form>

                @endif


                @if(session()->has('coupon'))

                    <button
                            type="button"
                            wire:click.prevent="removeCoupon"
                            class="modern-remove-coupon"
                    >
                        Remove coupon
                    </button>

                @endif

            </div>

        </div>

    @endif

</div>

