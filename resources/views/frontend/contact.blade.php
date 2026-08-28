@extends('layouts.app')

@section('title', 'Contact us')

@section('content')

    <main class="modern-contact-area">

        <section class="store-section contact-section">

            <div class="store-container">

                {{-- Contact Header --}}
                <div class="store-section-heading contact-page-heading">
                    <div>
                        <span>CONTACT</span>
                        <h2>Get In Touch</h2>
                    </div>
                </div>


                {{-- Contact Layout --}}
                <div class="contact-layout">

                    {{-- Contact Form --}}
                    <div class="contact-form-card">

                        <div class="contact-card-heading">
                            <span>MESSAGE US</span>
                            <h3>Contact Information</h3>
                            <p>
                                Have a question or need assistance?
                                Send us a message and we'll get back to you.
                            </p>
                        </div>

                        @include('partials.frontend.flash')

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="contact-form-grid">

                                {{-- Name --}}
                                <div class="contact-field">
                                    <label for="contact-name">Name</label>

                                    <input
                                            id="contact-name"
                                            type="text"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="Your name"
                                    >

                                    @error('name')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Email --}}
                                <div class="contact-field">
                                    <label for="contact-email">Email</label>

                                    <input
                                            id="contact-email"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="Your email"
                                    >

                                    @error('email')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Title --}}
                                <div class="contact-field contact-field-full">
                                    <label for="contact-title">Subject</label>

                                    <input
                                            id="contact-title"
                                            type="text"
                                            name="title"
                                            value="{{ old('title') }}"
                                            placeholder="What is this about?"
                                    >

                                    @error('title')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Message --}}
                                <div class="contact-field contact-field-full">
                                    <label for="contact-message">Message</label>

                                    <textarea
                                            id="contact-message"
                                            name="message"
                                            placeholder="Write your message..."
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                    <span class="contact-error">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                            {{-- Submit --}}
                            <button
                                    type="submit"
                                    class="contact-submit"
                            >
                                <span>Send Message</span>

                                <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                >
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                            </button>

                        </form>

                    </div>


                    {{-- Contact Information --}}
                    <aside class="contact-info-card">

                        <div class="contact-card-heading">
                            <span>CONTACT DETAILS</span>
                            <h3>Location & Details</h3>
                        </div>


                        <div class="contact-info-list">

                            {{-- Address --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                    >
                                        <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="2.5"></circle>
                                    </svg>
                                </div>

                                <div>
                                    <span>Address</span>
                                    <p>{!! getSettingsOf('address') !!}</p>
                                </div>

                            </div>


                            {{-- Email --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                    >
                                        <rect
                                                x="3"
                                                y="5"
                                                width="18"
                                                height="14"
                                                rx="2"
                                        ></rect>
                                        <path d="m3 7 9 6 9-6"></path>
                                    </svg>
                                </div>

                                <div>
                                    <span>Email</span>
                                    <p>{!! getSettingsOf('site_email') !!}</p>
                                </div>

                            </div>


                            {{-- Phone --}}
                            <div class="contact-info-item">

                                <div class="contact-info-icon">
                                    <svg
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                    >
                                        <path d="M7 3h3l2 5-2 2a14 14 0 0 0 4 4l2-2 5 2v3c0 1-1 2-2 2C10.8 19 5 13.2 5 6c0-1.7.8-3 2-3Z"></path>
                                    </svg>
                                </div>

                                <div>
                                    <span>Phone</span>
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
