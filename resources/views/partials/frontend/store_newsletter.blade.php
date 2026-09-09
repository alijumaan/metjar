<section class="store-newsletter">

    <div class="store-container">

        <div class="store-newsletter-inner">

            <div>

                <span>
                    {{ __('home.newsletter.eyebrow') }}
                </span>

                <h2>
                    {{ __('home.newsletter.title') }}
                </h2>

                <p>
                    {{ __('home.newsletter.description') }}
                </p>

            </div>


            <form class="store-newsletter-form" action="javascript:void(0);">

                <input
                        type="email"
                        placeholder="{{ __('home.newsletter.email_placeholder') }}"
                        required
                >

                <button type="submit">

                    {{ __('home.newsletter.join') }}

                    <span class="newsletter-arrow">→</span>

                </button>

            </form>
        </div>

    </div>

</section>