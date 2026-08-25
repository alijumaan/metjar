<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Services\CartService;
use Livewire\Component;

class SingleProductCartComponent extends Component
{
    public $quantity = 1;
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1){
            $this->quantity--;
        }
    }

    public function increaseQuantity()
    {
        if ($this->product->quantity > $this->quantity){
            $this->quantity++;
        } else {
            $this->dispatch(
    'show-alert',
    type: 'warning',
    message: 'maximum quantity added!'
);
        }
    }

    public function addToCart()
    {
        try {
            (new CartService())->addToList('default', $this->product);
            $this->dispatch('update_cart');
            $this->dispatch(
    'show-alert',
    type: 'success',
    message: 'added to Cart.'
);
        } catch(\Exception $exception) {
            $this->dispatch(
    'show-alert',
    type: 'warning',
    message: $exception->getMessage()
);
        }
    }

    public function addToWishList()
    {
        try {
            (new CartService())->addToList('wishlist', $this->product);
            $this->dispatch('update_wishlist');
            $this->dispatch(
    'show-alert',
    type: 'success',
    message: 'added to Wishlist.'
);
        } catch(\Exception $exception) {
            $this->dispatch(
    'show-alert',
    type: 'warning',
    message: $exception->getMessage()
);
        }
    }

    public function render()
    {
        return view('livewire.frontend.product.single-product-cart-component');
    }
}
