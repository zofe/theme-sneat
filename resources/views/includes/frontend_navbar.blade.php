{{-- Sneat theme — public navbar --}}
<nav class="navbar navbar-expand-lg bg-navbar-theme shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">{{ config('rapyd.layout.brand') ?: config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto align-items-lg-center">
                @section('left_navbar')
                    @foreach(config('rapyd.menus.frontend', []) as $menu)
                        @include($menu)
                    @endforeach
                @show
                @if(Route::has('admin.home') && Auth::user())
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">{{ Auth::user()->hasRole('admin') ? 'Admin' : 'Dashboard' }}</a></li>
                @endif
            </ul>

            <ul class="navbar-nav ms-auto flex-row align-items-center gap-3">
                @stack('right_navbar')

                @guest
                    @if(config('rapyd.layout.auth_links', true))
                        @if(Route::has('login'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif
                        @if(Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @endif
                @else
                    @include('layout::includes.user_info_dropdown')
                @endguest
                @include('layout::includes.theme_switcher')
                @include('layout::includes.theme_picker')
            </ul>
        </div>
    </div>
</nav>
