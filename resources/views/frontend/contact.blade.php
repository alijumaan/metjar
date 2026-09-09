@extends('layouts.app')

@section('title', __('contact.get_in_touch'))

@section('content')

    <main class="modern-contact-area">

        <section class="store-section contact-section">

            <div class="store-container">

                {{-- Contact Header --}}
                <div class="store-section-heading contact-page-heading">
                    <div>
                        <span>{{ __('contact.contact') }}</span>
                        <h2>{{ __('contact.get_in_touch') }}</h2>
                    </div>
                </div>


                {{-- Contact Layout --}}
                <div class="contact-layout">

                    {{-- Contact Form --}}
                    <div class="contact-form-card">

                        <div class="contact-card-heading">
                            <span>{{ __('contact.message_us') }}</span>
                            <h3>{{ __('contact.contact_info') }}</h3>
                            <p>{{ __('contact.contact_text') }}</p>
                        </div>

                        @include('partials.frontend.flash')

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="contact-form-grid">

                                {{-- Name --}}
                                <div class="contact-field">
                                    <label for="contact-name">{{ __('contact.name') }}</label>

                                    <input
                                            id="contact-name"
                                            type="text"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="{{ __('contact.name_placeholder') }}"
                                    >

                                    @error('name')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Email --}}
                                <div class="contact-field">
                                    <label for="contact-email">{{ __('contact.email') }}</label>

                                    <input
                                            id="contact-email"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="{{ __('contact.email_placeholder') }}"
                                    >

                                    @error('email')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Subject --}}
                                <div class="contact-field contact-field-full">
                                    <label for="contact-title">{{ __('contact.subject') }}</label>

                                    <input
                                            id="contact-title"
                                            type="text"
                                            name="title"
                                            value="{{ old('title') }}"
                                            placeholder="{{ __('contact.subject_placeholder') }}"
                                    >

                                    @error('title')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Message --}}
                                <div class="contact-field contact-field-full">
                                    <label for="contact-message">{{ __('contact.message') }}</label>

                                    <textarea
                                            id="contact-message"
                                            name="message"
                                            placeholder="{{ __('contact.message_placeholder') }}"
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                            {{-- Submit --}}
                            <button type="submit" class="contact-submit">
                                <span>{{ __('contact.send_message') }}</span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </button>

                        </form>

                    </div>


                    {{-- Contact Information --}}
                    <aside class="contact-info-card">

                        <div class="contact-card-heading">
                            <span>{{ __('contact.contact_details') }}</span>
                            <h3>{{ __('contact.location_details') }}</h3>
                        </div>


                        <div class="contact-info-list">

                            {{-- Address --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="2.5"></circle>
                                    </svg>
                                </div>

                                <div>
                                    <span>{{ __('contact.address') }}</span>
                                    <p>{!! getSettingsOf('address') !!}</p>
                                </div>

                            </div>


                            {{-- Email --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                        <path d="m3 7 9 6 9-6"></path>
                                    </svg>
                                </div>

                                <div>
                                    <span>{{ __('contact.email') }}</span>
                                    <p>{!! getSettingsOf('site_email') !!}</p>
                                </div>

                            </div>


                            {{-- Phone --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M7 3h3l2 5-2 2a14 14 0 0 0 4 4l2-2 5 2v3c0 1-1 2-2 2C10.8 19 5 13.2 5 6c0-1.7.8-3 2-3Z"></path>
                                    </svg>
                                </div>

                                <div>
                                    <span>{{ __('contact.phone') }}</span>
                                    <p>{!! getSettingsOf('phone_number') !!}</p>
                                </div>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </section>

    </main>

@endsection
