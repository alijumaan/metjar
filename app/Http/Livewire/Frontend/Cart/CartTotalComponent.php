<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Coupon;
use Livewire\Component;

class CartTotalComponent extends Component
{
    public $cartSubTotal;
    public $cartTotal;
    public $cartTax;
    public $cartDiscount;
    public $cartShipping;
    public $couponCode;

    protected $listeners = [
        'update_cart' => 'mount'
    ];

    public function mount()
    {
        $this->cartSubTotal = getNumbersOfCart()->get('subtotal');
        $this->cartTotal = getNumbersOfCart()->get('total');
        $this->cartTax = getNumbersOfCart()->get('productTaxes');
        $this->cartDiscount = getNumbersOfCart()->get('discount');
        $this->cartShipping = getNumbersOfCart()->get('shipping');
    }

    public function applyDiscount()
    {
        if (!getNumbersOfCart()) {
            $this->couponCode = '';

            $this->dispatch(
                'show-alert',
                type: 'error',
                message: 'No products available in your cart'
            );

            return;
        }

        $coupon = Coupon::whereCode($this->couponCode)
            ->whereStatus(true)
            ->first();

        if (!$coupon) {
            $this->couponCode = '';

            $this->dispatch(
                'show-alert',
                type: 'error',
                message: 'Coupon is invalid'
            );

            return;
        }

        $subtotal = (float) getNumbersOfCart()->get('subtotal');
        $greaterThan = (float) $coupon->greater_than;

        if ($greaterThan > $subtotal) {
            $this->couponCode = '';

            $this->dispatch(
                'show-alert',
                type: 'warning',
                message: 'Subtotal must greater than $' . $greaterThan
            );

            return;
        }

        $couponValue = (float) $coupon->discount($subtotal);

        if ($couponValue < 0) {
            $this->couponCode = '';

            $this->dispatch(
                'show-alert',
                type: 'error',
                message: 'Product coupon is invalid'
            );

            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'value' => $coupon->value,
            'discount' => $couponValue,
        ]);

        $this->couponCode = $coupon->code;

        $this->dispatch('update_cart');
        $this->dispatch('update_message_cart_not_found');

        $this->dispatch(
            'show-alert',
            type: 'success',
            message: 'Coupon is applied successfully'
        );
    }

    public function removeCoupon()
    {
        session()->remove('coupon');
        $this->couponCode = '';
        $this->dispatch('update_cart');
        $this->dispatch(
    'show-alert',
    type: 'success',
    message: 'remove coupon successfully'
);
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-total-component');
    }
}
