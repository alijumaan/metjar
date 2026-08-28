@extends('layouts.app')

@section('title', 'Registration')

@section('content')

    <main class="modern-auth-page">

        <section class="modern-auth-section">

            <div class="store-container">

                {{-- Header --}}
                <div class="modern-auth-heading">
                    <span>ACCOUNT</span>
                    <h1>Create Account</h1>
                    <p>Register a new account and start shopping with us.</p>
                </div>


                {{-- Register Card --}}
                <div class="modern-auth-layout">

                    <div class="modern-auth-card">

                        <div class="modern-auth-card-header">
                            <span class="modern-auth-label">REGISTER</span>
                            <h2>Create your account</h2>
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
                                    First Name
                                </label>

                                <input
                                        id="first_name"
                                        type="text"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        placeholder="Enter your first name"
                                        autocomplete="given-name"
                                >

                                @error('first_name')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Last Name --}}
                            <div class="modern-auth-field">

                                <label for="last_name">
                                    Last Name
                                </label>

                                <input
                                        id="last_name"
                                        type="text"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        placeholder="Enter your last name"
                                        autocomplete="family-name"
                                >

                                @error('last_name')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Username --}}
                            <div class="modern-auth-field">

                                <label for="username">
                                    Username
                                </label>

                                <input
                                        id="username"
                                        type="text"
                                        name="username"
                                        value="{{ old('username') }}"
                                        placeholder="Choose a username"
                                        autocomplete="username"
                                >

                                @error('username')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Email --}}
                            <div class="modern-auth-field">

                                <label for="email">
                                    E-Mail Address
                                </label>

                                <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email"
                                        autocomplete="email"
                                >

                                @error('email')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Phone --}}
                            <div class="modern-auth-field">

                                <label for="phone">
                                    Phone
                                </label>

                                <input
                                        id="phone"
                                        type="tel"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="Enter your phone number"
                                        autocomplete="tel"
                                >

                                @error('phone')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Password --}}
                            <div class="modern-auth-field">

                                <label for="password">
                                    New Password
                                </label>

                                <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="Create a password"
                                        autocomplete="new-password"
                                >

                                @error('password')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Confirm Password --}}
                            <div class="modern-auth-field">

                                <label for="password-confirm">
                                    Confirm Password
                                </label>

                                <input
                                        id="password-confirm"
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Confirm your password"
                                        autocomplete="new-password"
                                >

                                @error('password_confirmation')
                                <span class="modern-auth-error">
                                        {{ $message }}
                                    </span>
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

                                    <span>
                                        Remember Me
                                    </span>

                                </label>

                            </div>


                            {{-- Submit --}}
                            <button
                                    type="submit"
                                    class="modern-auth-submit"
                            >
                                <span>Register</span>

                                <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                >
                                    <path d="M5 12h13"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>

                            </button>


                            {{-- Login --}}
                            <div class="modern-auth-footer">

                                <span>
                                    Already have an account?
                                </span>

                                <a href="{{ route('login') }}">
                                    Login
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection

