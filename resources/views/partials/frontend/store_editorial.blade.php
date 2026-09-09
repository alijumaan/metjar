<section class="store-editorial">

    <div class="store-editorial-image">

        @if(isset($categories[0]) && $categories[0]->cover)

            <img
                    src="{{ asset('storage/images/categories/' . $categories[0]->cover) }}"
                    alt="{{ $categories[0]->name }}">

        @else

            <div class="store-editorial-placeholder">
                {{ __('home.editorial.placeholder') }}
            </div>

        @endif

    </div>


    <div class="store-editorial-content">

        <span>
            {{ __('home.editorial.eyebrow') }}
        </span>


        <h2>

            {{ __('home.editorial.title') }}

            <em>
                {{ __('home.editorial.title_emphasis') }}
            </em>

        </h2>


        <p>
            {{ __('home.editorial.description') }}
        </p>


        <a
                href="{{ route('shop.index') }}"
                class="store-button store-button-dark">

            {{ __('home.editorial.explore_collection') }}

            <span>→</span>

        </a>

    </div>

</section>