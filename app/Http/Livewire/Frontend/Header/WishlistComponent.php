<?php

namespace App\Http\Livewire\Frontend\Header;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistComponent extends Component
{
    public $wishlistCount;

    protected $listeners = [
        'update_wishlist' => 'wishlistCount',
        'remove_from_wishlist' => 'removeFromWishlist',
        'move_to_cart' => 'moveToCart'
    ];

    public function mount(): void
    {
        $this->wishlistCount();
    }

    public function wishlistCount()
    {
        $this->wishlistCount = Cart::instance('wishlist')->count();

        $this->dispatch('update_message_wishlist_not_found');
    }

    public function moveToCart($rowId): void
    {
        $item = Cart::instance('wishlist')->get($rowId);

        $duplicate = Cart::instance('default')->search(function ($cartItem, $rId) use ($rowId) {
            return $rId === $rowId;
        });

        if ($duplicate->isNotEmpty()) {
            $this->removeFromWishlist($rowId);
            $this->dispatch(
                'show-alert',
                type: 'warning',
                message: 'Product already exist.'
            );
        } else {
            Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
                ->associate(Product::class);
            $this->removeFromWishlist($rowId);
            $this->dispatch(
                'show-alert',
                type: 'success',
                message: 'Added to Cart.'
            );
        }
        $this->dispatch('update_cart');
    }

    public function removeFromWishlist($rowId): void
    {
        Cart::instance('wishlist')->remove($rowId);

        $this->dispatch('update_wishlist');
    }

    public function render()
    {
        return view('livewire.frontend.header.wishlist-component');
    }
}
