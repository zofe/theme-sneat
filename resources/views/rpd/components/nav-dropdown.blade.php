{{-- Sneat menu item with a sub-menu, same props as rpd::nav-dropdown --}}
@props(['icon' => null, 'label' => null, 'route' => null, 'url' => null, 'href' => null, 'click' => null, 'params' => [], 'active' => false])
@php
    $active = item_active($active, $route, $params, $url);
@endphp
<li class="menu-item {{ $active ? 'active open' : '' }}">
    <a href="#" class="menu-link menu-toggle">
        <span class="menu-icon"><x-rpd::icon :name="$icon"/></span>
        <div class="text-truncate">{{ $label }}</div>
    </a>
    <ul class="menu-sub">
        {{ $slot }}
    </ul>
</li>
