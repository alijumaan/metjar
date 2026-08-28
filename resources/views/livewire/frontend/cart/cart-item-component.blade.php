<tr x-data="{ show: true }" x-show="show">
    <td class="product-thumbnail">
        <a href="{{ route('product.show', $cartItem->model->slug) }}">
            @if($cartItem->model->firstMedia)
                <img src="{{ asset('storage/images/products/' . $cartItem->model->firstMedia->file_name) }}"
                     alt="{{ $cartItem->model->name }}" width="70"/>
            @else
                <img src="{{ asset('img/no-img.png') }}"
                     alt="{{ $cartItem->model->name }}" width="70"/>
            @endif

        </a>
    </td>
    <td class="product-name">
        <a href="#">{{ $cartItem->model->name }}</a>
    </td>
    <td class="product-price-cart">
        <span class="amount" style="font-size: 16px;">${{ $cartItem->model->price }}</span>
    </td>
    <td class="product-quantity" style="font-size: 16px;">
        <div class="modern-cart-quantity">

            <button
                    type="button"
                    wire:click.prevent="decreaseQuantity('{{ $cartItem->rowId }}')"
                    class="modern-quantity-button"
                    aria-label="Decrease quantity"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 12h12"></path>
                </svg>
            </button>


            <span class="modern-quantity-value">
        {{ $itemQuantity }}
    </span>


            <button
                    type="button"
                    wire:click.prevent="increaseQuantity('{{ $cartItem->rowId }}', '{{ $cartItem->id }}')"
                    class="modern-quantity-button"
                    aria-label="Increase quantity"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 6v12"></path>
                    <path d="M6 12h12"></path>
                </svg>
            </button>

        </div>
    </td>
    <td>
        <p class="mb-0">${{ ($cartItem->model->price) * ($cartItem->qty) }}</p>
    </td>
    <td>
        <a wire:click.prevent="removeFromCart('{{ $cartItem->rowId }}')"
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




