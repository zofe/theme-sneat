{{-- Theme picker (config rapyd.theme_switch): the bundled look and every registered theme, kept per visitor in the session. --}}
@if(config('rapyd.theme_switch') && config('rapyd.themes'))
    @php($themes = app(\Zofe\Rapyd\Themes\ThemeManager::class))
    <li class="nav-item dropdown me-3">
        <a href="#" class="nav-link dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" title="Theme" aria-label="Choose theme">
            <i class="fas fa-palette"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            @foreach($themes->names() as $name)
                <li><a class="dropdown-item {{ $name === $themes->active() ? 'active' : '' }}"
                       href="{{ request()->fullUrlWithQuery([\Zofe\Rapyd\Themes\ThemeManager::QUERY => $name]) }}">{{ ucfirst($name) }}</a></li>
            @endforeach
        </ul>
    </li>
@endif
