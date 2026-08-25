<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistItemComponent extends Component
{
    public string $item;

    public function moveToCart($rowId): void
    {
        $this->dispatch('move_to_cart', $rowId);
        $this->dispatch(
            'show-alert',
            type: 'success',
            message: 'Item move to cart.'
        );
    }

    public function removeFromWishlist($rowId): void
    {
        $this->dispatch('remove_from_wishlist', $rowId);
        $this->dispatch(
            'show-alert',
            type: 'success',
            message: 'Item removed from wishlist!'
        );
    }

    public function render()
    {
        return view('livewire.frontend.wishlist.wishlist-item-component', [
            'wishlistItem' => Cart::instance('wishlist')->content()->get($this->item)
        ]);
    }
}
