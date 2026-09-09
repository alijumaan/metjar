<section class="store-section store-trending">

    <div class="store-container">

        <div class="store-section-heading">

            <div>

                <span>
                    {{ __('home.trending.eyebrow') }}
                </span>

                <h2>
                    {{ __('home.trending.title') }}
                </h2>

            </div>


            <a href="{{ route('shop.index') }}">

                {{ __('home.trending.view_all') }}

                <span class="section-arrow">→</span>

            </a>

        </div>


        <div class="store-trending-wrapper">

            <livewire:frontend.product.top-trending-products />

        </div>

    </div>

</section>