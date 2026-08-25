<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class RelatedProductsComponent extends Component
{
    public $relatedProducts;

    public function mount($relatedProducts)
    {
        $this->relatedProducts = $relatedProducts;
    }

    public function addToCart($id)
    {
        $product = Product::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        try {
            (new CartService())->addToList('default', $product);
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

    public function addToWishList($id)
    {
        $product = Product::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        try {
            (new CartService())->addToList('wishlist', $product);
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
        return view('livewire.frontend.product.related-products-component');
    }
}
