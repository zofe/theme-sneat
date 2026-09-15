{{-- Sneat vertical menu: brand, the modules' menus (rpd nav-* components rendered as Sneat menu items) --}}
@php
    $homeRoute = Route::has('admin.home') ? route('admin.home') : (Route::has('home') ? route('home') : url('/'));
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
        @php($brand = config('rapyd.layout.brand') ?: config('app.name'))
        <a href="{{ $homeRoute }}" class="app-brand-link gap-2">
            @if(config('rapyd.layout.logo_sidebar'))
                <span class="app-brand-logo"><img src="{{ config('rapyd.layout.logo_sidebar') }}" alt="{{ $brand }}"></span>
            @else
                {{-- the initial stays when the menu is collapsed to icons, the text fades out (Sneat's app-brand rules) --}}
                <span class="app-brand-logo"><span class="app-brand-initial">{{ mb_strtoupper(mb_substr(trim($brand), 0, 1)) }}</span></span>
                <span class="app-brand-text menu-text fw-bold text-primary">{{ $brand }}</span>
            @endif
        </a>
        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto" aria-label="Toggle menu">
            <i class="fas fa-chevron-left align-middle"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>

    @if(app()->environment(['stage']))
        <div class="text-center py-1 text-warning fw-bold">{{ app()->environment() }}</div>
    @endif

    <ul class="menu-inner py-1">
        @section('left_sidebar')
            @foreach(config('rapyd.menus.admin', []) as $menu)
                @include($menu)
            @endforeach
            @includeIf('menu')
        @show
        @yield('role_menu')
        @stack('sidebar_footer')
    </ul>
</aside>
