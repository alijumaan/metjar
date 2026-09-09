@extends('layouts.app')

@section('title', __('auth.login_title'))

@section('content')

    <main class="modern-auth-page">

        <section class="modern-auth-section">

            <div class="store-container">

                <div class="modern-auth-wrapper">

                    {{-- Header --}}
                    <div class="modern-auth-heading">

                        <span>{{ __('auth.account') }}</span>

                        <h1>{{ __('auth.login_title') }}</h1>

                        <p>{{ __('auth.login_subtitle') }}</p>

                    </div>


                    {{-- Login Card --}}
                    <div class="modern-auth-card">

                        <form
                                action="{{ route('login') }}"
                                method="POST"
                                class="modern-auth-form"
                        >

                            @csrf

                            {{-- Username --}}
                            <div class="modern-auth-field">

                                <label for="username">
                                    {{ __('auth.username') }}
                                    <span>*</span>
                                </label>

                                <input
                                        id="username"
                                        type="text"
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="{{ __('auth.username_placeholder') }}"
                                        autocomplete="username"
                                        required
                                >

                                @error('username')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Password --}}
                            <div class="modern-auth-field">

                                <label for="pass">
                                    {{ __('auth.password') }}
                                    <span>*</span>
                                </label>

                                <div class="modern-password-wrapper">

                                    <input
                                            id="pass"
                                            type="password"
                                            name="password"
                                            placeholder="{{ __('auth.password_placeholder') }}"
                                            autocomplete="current-password"
                                            required
                                    >

                                    <button
                                            type="button"
                                            class="modern-password-toggle"
                                            id="passwordToggle"
                                            aria-label="{{ __('auth.show_password') }}"
                                    >

                                        <svg
                                                class="modern-password-eye"
                                                viewBox="0 0 24 24"
                                                aria-hidden="true"
                                        >
                                            <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"></path>
                                            <circle cx="12" cy="12" r="2.5"></circle>
                                        </svg>

                                    </button>

                                </div>

                                @error('password')
                                <span class="modern-auth-error">{{ $message }}</span>
                                @enderror

                            </div>


                            {{-- Remember / Forgot --}}
                            <div class="modern-auth-options">

                                <label class="modern-auth-checkbox">

                                    <input
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                            {{ old('remember') ? 'checked' : '' }}
                                    >

                                    <span>{{ __('auth.remember_me') }}</span>

                                </label>


                                @if (Route::has('password.request'))

                                    <a
                                            href="{{ route('password.request') }}"
                                            class="modern-auth-link"
                                    >
                                        {{ __('auth.forgot_password') }}
                                    </a>

                                @endif

                            </div>


                            {{-- Login --}}
                            <button
                                    type="submit"
                                    class="modern-auth-submit"
                            >

                                <span>{{ __('auth.login_button') }}</span>

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </button>


                            {{-- Register --}}
                            <div class="modern-auth-register">

                                <span>{{ __('auth.no_account') }}</span>

                                <a href="{{ route('register') }}">
                                    {{ __('auth.create_account') }}
                                </a>

                            </div>


                            {{-- Social Login --}}
                            <div class="modern-auth-divider">
                                <span>{{ __('auth.or') }}</span>
                            </div>

                            <a
                                    href="{{ route('social_login', 'facebook') }}"
                                    class="modern-social-button"
                            >

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M14 8h3V4h-3c-3.3 0-5 1.9-5 5v3H6v4h3v4h4v-4h3l1-4h-4V9c0-.7.3-1 1-1Z"></path>
                                </svg>

                                <span>{{ __('auth.login_facebook') }}</span>

                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection


@section('script')

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const passwordInput = document.getElementById('pass');
            const passwordToggle = document.getElementById('passwordToggle');

            if (!passwordInput || !passwordToggle) {
                return;
            }

            passwordToggle.addEventListener('click', function () {

                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                passwordToggle.setAttribute(
                    'aria-label',
                    isPassword
                        ? '{{ __('auth.hide_password') }}'
                        : '{{ __('auth.show_password') }}'
                );

            });

        });

    </script>

@endsection
