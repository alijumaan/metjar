<tr x-data="{ show: true }" x-show="show">
    <td class="product-thumbnail">
        @if($wishlistItem->model->firstMedia)
            <a href="{{ route('product.show', $wishlistItem->model->slug) }}">
                <img src="{{ asset('storage/images/products/' . $wishlistItem->model->firstMedia->file_name) }}"
                     alt="{{ $wishlistItem->model->name }}" width="70">
            </a>
        @else
            <img src="{{ asset('img/no-img.png') }}" alt="{{ $wishlistItem->model->name }}" width="70"/>
        @endif
    </td>
    <td class="product-name"><a href="{{ route('product.show', $wishlistItem->model->slug) }}">{{ $wishlistItem->model->name }}</a></td>
    <td class="product-name">
        <a wire:click="moveToCart('{{ $wishlistItem->rowId }}')"
           x-on:click="show = false"
           style="cursor: pointer;" class="text-primary">
            move to cart
        </a>
    </td>
    <td class="product-price-cart">
        <span class="amount">${{ $wishlistItem->model->price }}</span>
    </td>
    <td>
        <a wire:click.prevent="removeFromWishlist('{{ $wishlistItem->rowId }}')"
           x-on:click="show = false"
           style="cursor: pointer;">
            <svg width="20"
                 height="20"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="1.7"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 style="vertical-align: middle;">
                <path d="M3 6h18"/>
                <path d="M8 6V4h8v2"/>
                <path d="M19 6l-1 14H6L5 6"/>
                <path d="M10 11v5"/>
                <path d="M14 11v5"/>
            </svg>
        </a>
    </td>
</tr>
