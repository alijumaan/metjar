<section class="store-section"
         id="categories">

    <div class="store-container">

        <div class="store-section-heading">

            <div>

                <span>
                    {{ __('home.categories.eyebrow') }}
                </span>

                <h2>
                    {{ __('home.categories.title') }}
                </h2>

            </div>


            <a href="{{ route('shop.index') }}">

                {{ __('home.categories.view_all') }}

                <span class="section-arrow">
                    →
                </span>

            </a>

        </div>


        <div class="store-categories">

            @foreach($categories->take(4) as $index => $category)

                <a
                        href="{{ route('shop.index', $category->slug) }}"
                        class="store-category">

                    @if($category->cover)

                        <img
                                src="{{ asset('storage/images/categories/' . $category->cover) }}"
                                alt="{{ $category->name }}">

                    @else

                        <div class="store-category-placeholder">

                            {{ $category->name }}

                        </div>

                    @endif


                    <div class="store-category-overlay">

                        <span>
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <h3>
                            {{ $category->name }}
                        </h3>

                        <b>
                            {{ __('home.categories.shop') }}

                            <span class="category-arrow">→</span>
                        </b>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>