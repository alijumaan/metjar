@extends('layouts.app')

@section('title', __('user.dashboard'))

@section('content')
    <main class="modern-account-page">

        {{-- =====================================================
             ACCOUNT HERO
             ===================================================== --}}
        <section class="modern-account-hero">

            <div class="store-container">

                <div class="modern-account-hero-content">

                <span class="modern-account-eyebrow">
                    {{ __('user.my_account') }}
                </span>

                    <h1>
                        {{ __('user.dashboard') }}
                    </h1>

                    <div class="modern-account-breadcrumb">
                        <a href="{{ route('home') }}">
                            {{ __('user.home') }}
                        </a>

                        <span>/</span>

                        <span>
                        {{ __('user.my_profile') }}
                    </span>
                    </div>

                </div>

            </div>

        </section>


        {{-- =====================================================
             ACCOUNT CONTENT
             ===================================================== --}}
        <section class="modern-account-content">

            <div class="store-container">

                <div class="modern-account-layout">

                    {{-- =================================================
                         MAIN
                         ================================================= --}}
                    <div class="modern-account-main">

                        <div class="modern-account-welcome">

                        <span class="modern-account-section-label">
                            {{ __('user.account_overview') }}
                        </span>

                            <h2>
                                {{ __('user.welcome_back') }}
                            </h2>

                            <p>
                                {{ __('user.manage_account') }}
                            </p>

                        </div>


                        {{-- Account cards --}}
                        <div class="modern-account-cards">

                            <a
                                    href="{{ route('user.orders') }}"
                                    class="modern-account-card"
                            >
                                <div class="modern-account-card-number">
                                    01
                                </div>

                                <div class="modern-account-card-content">
                                    <h3>
                                        {{ __('user.orders_title') }}
                                    </h3>

                                    <p>
                                        {{ __('user.orders_description') }}
                                    </p>
                                </div>
                            </a>


                            <a
                                    href="{{ route('user.profile') }}"
                                    class="modern-account-card"
                            >
                                <div class="modern-account-card-number">
                                    02
                                </div>

                                <div class="modern-account-card-content">
                                    <h3>
                                        {{ __('user.profile_title') }}
                                    </h3>

                                    <p>
                                        {{ __('user.profile_description') }}
                                    </p>
                                </div>
                            </a>


                            <a
                                    href="{{ route('user.addresses') }}"
                                    class="modern-account-card"
                            >
                                <div class="modern-account-card-number">
                                    03
                                </div>

                                <div class="modern-account-card-content">
                                    <h3>
                                        {{ __('user.addresses_title') }}
                                    </h3>

                                    <p>
                                        {{ __('user.addresses_description') }}
                                    </p>
                                </div>
                            </a>

                        </div>

                    </div>


                    {{-- =================================================
                         SIDEBAR
                         ================================================= --}}
                    <aside class="modern-account-sidebar">

                        @include('partials.frontend.user.sidebar')

                    </aside>

                </div>

            </div>

        </section>

    </main>

@endsection
