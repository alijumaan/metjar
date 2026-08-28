@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <main class="modern-auth-page">

        <section class="modern-auth-section">

            <div class="store-container">

                <div class="modern-auth-wrapper">

                    {{-- Header --}}
                    <div class="modern-auth-heading">

                        <span>ACCOUNT</span>

                        <h1>Login</h1>

                        <p>
                            Sign in to your account to continue.
                        </p>

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
                                    Username
                                    <span>*</span>
                                </label>

                                <input
                                        id="username"
                                        type="text"
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="Enter your username"
                                        autocomplete="username"
                                        required
                                >

                                @error('username')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Password --}}
                            <div class="modern-auth-field">

                                <label for="pass">
                                    Password
                                    <span>*</span>
                                </label>

                                <div class="modern-password-wrapper">

                                    <input
                                            id="pass"
                                            type="password"
                                            name="password"
                                            placeholder="Enter your password"
                                            autocomplete="current-password"
                                            required
                                    >

                                    <button
                                            type="button"
                                            class="modern-password-toggle"
                                            id="passwordToggle"
                                            aria-label="Show password"
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
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
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

                                    <span>
                                        Remember me
                                    </span>

                                </label>


                                @if (Route::has('password.request'))

                                    <a
                                            href="{{ route('password.request') }}"
                                            class="modern-auth-link"
                                    >
                                        Forgot your password?
                                    </a>

                                @endif

                            </div>


                            {{-- Login --}}
                            <button
                                    type="submit"
                                    class="modern-auth-submit"
                            >

                                <span>Login</span>

                                <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                >
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </button>


                            {{-- Register --}}
                            <div class="modern-auth-register">

                                <span>Don't have an account?</span>

                                <a href="{{ route('register') }}">
                                    Create an account
                                </a>

                            </div>


                            {{-- Social Login --}}
                            <div class="modern-auth-divider">
                                <span>OR</span>
                            </div>

                            <a
                                    href="{{ route('social_login', 'facebook') }}"
                                    class="modern-social-button"
                            >

                                <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                >
                                    <path d="M14 8h3V4h-3c-3.3 0-5 1.9-5 5v3H6v4h3v4h4v-4h3l1-4h-4V9c0-.7.3-1 1-1Z"></path>
                                </svg>

                                <span>
                                    Login with Facebook
                                </span>

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
                    isPassword ? 'Hide password' : 'Show password'
                );

            });

        });

    </script>

@endsection

