<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Ali Shop') }} | @yield('title', 'Home')
    </title>

    <meta name="description" content="@yield('meta_description', 'Discover electronics, fashion, watches and footwear.')">

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- New storefront --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/modern-store.css') }}">

    @livewireStyles
    @yield('style')
</head>

<body>

@include('partials.frontend.modern-header')

@include('partials.frontend.flash')

<main>
    @yield('content')
</main>

@include('partials.frontend.footer')

<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchButton = document.getElementById('storeSearchButton');
        const searchPanel = document.getElementById('storeSearch');
        const searchClose = document.getElementById('storeSearchClose');
        const mobileToggle = document.getElementById('storeMobileToggle');
        const mobileMenu = document.getElementById('storeMobileMenu');
        const mobileClose = document.getElementById('storeMobileClose');

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if (searchButton && searchPanel) {
            searchButton.addEventListener('click', function () {
                searchPanel.classList.toggle('is-open');
                if (searchPanel.classList.contains('is-open')) {
                    setTimeout(function () {
                        const input =
                            document.getElementById('search');
                        if (input) {
                            input.focus();
                        }
                    }, 300);
                }
            });
        }

        if (searchClose && searchPanel) {
            searchClose.addEventListener('click', function () {
                searchPanel.classList.remove('is-open');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Mobile menu
        |--------------------------------------------------------------------------
        */
        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function () {
                mobileMenu.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            });
        }

        if (mobileClose && mobileMenu) {
            mobileClose.addEventListener('click', function () {
                mobileMenu.classList.remove('is-open');
                document.body.style.overflow = '';
            });
        }

        /*
        |--------------------------------------------------------------------------
        | ESC
        |--------------------------------------------------------------------------
        */

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape') {
                return;
            }

            if (searchPanel) {
                searchPanel.classList.remove('is-open');
            }

            if (mobileMenu) {
                mobileMenu.classList.remove('is-open');
                document.body.style.overflow = '';
            }
        });
    });
</script>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-alert', (event) => {
            Swal.fire({
                icon: event.type ?? 'success',
                title: event.message ?? '',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        });
    });
</script>
@livewireScripts
@yield('script')
</body>
</html>