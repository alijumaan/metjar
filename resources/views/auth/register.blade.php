@extends('layouts.app')

@section('title', __('register.create_account'))

@section('content')

    <main class="modern-auth-page">

        <section class="modern-auth-section">

            <div class="store-container">

                {{-- Header --}}
                <div class="modern-auth-heading">
                    <span>{{ __('register.account') }}</span>
                    <h1>{{ __('register.create_account') }}</h1>
                    <p>{{ __('register.register_subtitle') }}</p>
                </div>


                {{-- Register Card --}}
                <div class="modern-auth-layout">

                    <div class="modern-auth-card">

                        <div class="modern-auth-card-header">
                            <span class="modern-auth-label">{{ __('register.register_label') }}</span>
                            <h2>{{ __('register.register_title') }}</h2>
                        </div>


                        <form
                                method="POST"
                                action="{{ route('register') }}"
                                class="modern-auth-form"
                        >

                            @csrf

                            {{-- First Name --}}
                            <div class="modern-auth-field">

                                <label for="first_name">
                                    {{ __('register.first_name') }}
                                </label>

                                <input
                                        id="first_name"
                                        type="text"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        placeholder="{{ __('register.first_name_placeholder') }}"
                                        autocomplete="given-name"
                                >

                                @error('first_name')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Last Name --}}
                            <div class="modern-auth-field">

                                <label for="last_name">
                                    {{ __('register.last_name') }}
                                </label>

                                <input
                                        id="last_name"
                                        type="text"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        placeholder="{{ __('register.last_name_placeholder') }}"
                                        autocomplete="family-name"
                                >

                                @error('last_name')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Username --}}
                            <div class="modern-auth-field">

                                <label for="username">
                                    {{ __('register.username') }}
                                </label>

                                <input
                                        id="username"
                                        type="text"
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="{{ __('register.username_placeholder') }}"
                                        autocomplete="username"
                                >

                                @error('username')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Email --}}
                            <div class="modern-auth-field">

                                <label for="email">
                                    {{ __('register.email') }}
                                </label>

                                <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="{{ __('register.email_placeholder') }}"
                                        autocomplete="email"
                                >

                                @error('email')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Phone --}}
                            <div class="modern-auth-field">

                                <label for="phone">
                                    {{ __('register.phone') }}
                                </label>

                                <input
                                        id="phone"
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="{{ __('register.phone_placeholder') }}"
                                        autocomplete="tel"
                                >

                                @error('phone')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Password --}}
                            <div class="modern-auth-field">

                                <label for="password">
                                    {{ __('register.password') }}
                                </label>

                                <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="{{ __('register.password_placeholder') }}"
                                        autocomplete="new-password"
                                >

                                @error('password')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Confirm Password --}}
                            <div class="modern-auth-field">

                                <label for="password-confirm">
                                    {{ __('register.confirm_password') }}
                                </label>

                                <input
                                        id="password-confirm"
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="{{ __('register.confirm_password_placeholder') }}"
                                        autocomplete="new-password"
                                >

                                @error('password_confirmation')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Remember --}}
                            <div class="modern-auth-options">

                                <label class="modern-auth-checkbox">

                                    <input
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                            {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <span class="modern-auth-checkmark"></span>

                                    <span>{{ __('register.remember_me') }}</span>

                                </label>

                            </div>


                            {{-- Submit --}}
                            <button
                                    type="submit"
                                    class="modern-auth-submit"
                            >
                                <span>{{ __('register.register_button') }}</span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </button>


                            {{-- Login --}}
                            <div class="modern-auth-footer">

                                <span>{{ __('register.already_have_account') }}</span>

                                <a href="{{ route('login') }}">
                                    {{ __('register.login') }}
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection
