<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartItemComponent extends Component
{
    public $item;
    public $itemQuantity = 1;

    public function mount()
    {
        $this->itemQuantity = Cart::instance('default')->get($this->item)->qty ?? 1;
    }

    public function decreaseQuantity($rowId)
    {
        if ($this->itemQuantity > 1) {
            $this->itemQuantity -= 1;
            Cart::instance('default')->update($rowId, $this->itemQuantity);
            if (session()->has('coupon')) {
                $this->dispatch(
    'show-alert',
    type: 'info',
    message: 'Add you coupon again'
);
            }
            $this->clearSession();
            $this->dispatch('update_cart');
        }
    }

    public function increaseQuantity($rowId, $id)
    {
        $productQuantity = Product::whereId($id)->pluck('quantity')->first();

        if ($productQuantity > $this->itemQuantity && $this->itemQuantity > 0){
            $this->itemQuantity += 1;
            Cart::instance('default')->update($rowId, $this->itemQuantity);
            if (session()->has('coupon')) {
                $this->dispatch(
    'show-alert',
    type: 'info',
    message: 'Add you coupon again'
);
            }
            $this->clearSession();
            $this->dispatch('update_cart');
            $this->dispatch('update_message_cart_not_found');
        } else {
            $this->dispatch(
                'show-alert',
                type: 'warning',
                message: 'maximum quantity ' . $productQuantity
            );
        }
    }

    public function removeFromCart($rowId)
    {
        $this->clearSession();
        $this->dispatch('remove_from_cart', $rowId);

        $this->dispatch(
            'show-alert',
            type: 'success',
            message: 'Item removed from cart!'
        );
    }

    protected function clearSession()
    {
        session()->forget('coupon');
        session()->forget('shipping');
        session()->forget('saved_user_address_id');
        session()->forget('saved_shipping_company_id');
        session()->forget('saved_payment_method_id');
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-item-component', [
            'cartItem' => Cart::instance('default')->get($this->item)
        ]);
    }
}
