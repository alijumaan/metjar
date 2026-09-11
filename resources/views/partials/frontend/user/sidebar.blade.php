<div class="modern-account-menu">
    <div class="modern-account-menu-header">
    <span>
        {{ __('user.account') }}
    </span>

        <strong>
            {{ __('user.menu') }}
        </strong>
    </div>


    {{-- Dashboard --}}
    <a
            href="{{ route('user.dashboard') }}"
            class="modern-account-menu-item {{ Route::currentRouteName() == 'user.dashboard' ? 'is-active' : '' }}"
    >
    <span class="modern-account-menu-number">
        01
    </span>

        <span class="modern-account-menu-title">
        {{ __('user.dashboard') }}
    </span>
    </a>


    {{-- Profile --}}
    <a
            href="{{ route('user.profile') }}"
            class="modern-account-menu-item {{ Route::currentRouteName() == 'user.profile' ? 'is-active' : '' }}"
    >
    <span class="modern-account-menu-number">
        02
    </span>

        <span class="modern-account-menu-title">
        {{ __('user.profile') }}
    </span>
    </a>


    {{-- Addresses --}}
    <a
            href="{{ route('user.addresses') }}"
            class="modern-account-menu-item {{ Route::currentRouteName() == 'user.addresses' ? 'is-active' : '' }}"
    >
    <span class="modern-account-menu-number">
        03
    </span>

        <span class="modern-account-menu-title">
        {{ __('user.addresses') }}
    </span>
    </a>


    {{-- Orders --}}
    <a
            href="{{ route('user.orders') }}"
            class="modern-account-menu-item {{ Route::currentRouteName() == 'user.orders' ? 'is-active' : '' }}"
    >
    <span class="modern-account-menu-number">
        04
    </span>

        <span class="modern-account-menu-title">
        {{ __('user.orders') }}
    </span>
    </a>


    {{-- Logout --}}
    <a
            href="javascript:void(0);"
            class="modern-account-menu-item modern-account-logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    >
    <span class="modern-account-menu-number">
        05
    </span>

        <span class="modern-account-menu-title">
        {{ __('user.logout') }}
    </span>

    </a>


    <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            style="display:none;"
    >
        @csrf
    </form>

</div>
