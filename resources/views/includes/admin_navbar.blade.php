{{-- Sneat detached navbar: menu toggle (mobile), search, locale, theme toggle / picker, user menu --}}
<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="#" aria-label="Toggle menu"><i class="fas fa-bars fa-lg"></i></a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
        <div class="navbar-nav align-items-center me-auto">
            @if(config('rapyd.search.enabled', true) && Route::has('search.items'))
                @livewire('search::search-navbar')
            @endif
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
            @stack('navbar_right')

            @if(config('app.locales'))
                <li class="nav-item dropdown me-3">
                    <a href="#" class="nav-link dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('vendor/rapyd/img/'.app()->getLocale().'.svg') }}" width="18" alt="{{ app()->getLocale() }}">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach(config('app.locales') as $locale)
                            <li><a class="dropdown-item" href="{{ url_lang($locale) }}">{{ $locale }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endif

            @if(Route::has('admin.home') && Route::has('home'))
                <li class="nav-item d-none d-md-block me-3"><a class="nav-link p-0" href="{{ route('home') }}">{{ __('Home') }}</a></li>
            @endif

            @include('layout::includes.theme_switcher')
            @include('layout::includes.theme_picker')

            @guest
                @if(Route::has('login') && config('rapyd.layout.auth_links', true))
                    <li class="nav-item"><a class="nav-link p-0" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endif
            @endguest
            @auth
                @include('layout::includes.user_info_dropdown')
            @endauth
        </ul>
    </div>
</nav>
