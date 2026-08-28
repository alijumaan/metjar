<section class="store-editorial">

    <div class="store-editorial-image">

        @if(isset($categories[0]) && $categories[0]->cover)

            <img
                    src="{{ asset('storage/images/categories/' . $categories[0]->cover) }}"
                    alt="{{ $categories[0]->name }}">

        @else

            <div class="store-editorial-placeholder">
                DISCOVER
            </div>

        @endif

    </div>


    <div class="store-editorial-content">

        <span>
            CURATED FOR YOU
        </span>

        <h2>

            Upgrade

            <em>
                your everyday.
            </em>

        </h2>

        <p>

            From the latest technology to timeless style,
            discover pieces designed to make everyday life better.

        </p>


        <a href="{{ route('shop.index') }}"
           class="store-button store-button-dark">

            EXPLORE COLLECTION

            <span>→</span>

        </a>

    </div>

</section>