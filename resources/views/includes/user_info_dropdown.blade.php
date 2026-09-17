<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow p-0 d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-label="Open user menu">
        <div class="avatar" style="width: 30px; height: 30px">
            <img src="{{ Auth::user()->avatar ? asset('storage/users/'.Auth::user()->id.'/photos/avatar.jpg') : asset('vendor/rapyd/img/user-account-icon.png') }}" alt="" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover">
        </div>
        <div class="d-none d-xl-block ps-2 lh-1">
            <div class="fw-medium">{{ Auth::user()->name }}</div>
            @if(Auth::user()->company ?? null)
                <small class="text-secondary">{{ Auth::user()->company->business_name }}</small>
            @endif
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @if(Route::has('profile'))
            <li><a href="{{ route('profile') }}" class="dropdown-item"><i class="fas fa-user me-2 text-secondary"></i>{{ __('Profile') }}</a></li>
        @endif
        @impersonating
            <li><a href="{{ route('impersonate.leave') }}" class="dropdown-item">{{ __('Leave impersonation') }}</a></li>
        @endImpersonating
        @yield('user_info_dropdown')
        <li><div class="dropdown-divider my-1"></div></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="#" onclick="this.parentNode.submit();"><i class="fas fa-power-off me-2 text-secondary"></i>{{ __('Logout') }}</a>
            </form>
        </li>
    </ul>
</li>
