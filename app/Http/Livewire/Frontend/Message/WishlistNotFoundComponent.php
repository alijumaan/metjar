<?php

namespace App\Http\Livewire\Frontend\Message;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistNotFoundComponent extends Component
{
    public $wishlistNoFound = false;

    protected $listeners = [
        'update_message_wishlist_not_found' => 'checkWishlist',
    ];

    public function mount(): void
    {
        $this->checkWishlist();
    }

    public function checkWishlist(): void
    {
        $this->wishlistNoFound = Cart::instance('wishlist')->count() === 0;
    }

    public function render()
    {
        return view('livewire.frontend.message.wishlist-not-found-component');
    }
}