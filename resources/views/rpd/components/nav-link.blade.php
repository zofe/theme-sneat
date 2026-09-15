{{-- Sneat: a sub-item (type="collapse-item") is a menu-item of the menu-sub, anything else a menu-link --}}
@props(['icon' => null, 'label' => null, 'route' => null, 'url' => null, 'href' => null, 'click' => null, 'params' => [], 'active' => false, 'type' => 'nav-link', 'fromItem' => false])
@php
    $active = item_active($active, $route, $params, $url);
    $href = item_href($route, $params, $url);
    if ($fromItem) { $active = false; }
    $attributes = $attributes->class(['menu-link', 'active' => $active])->merge(['href' => $href, 'wire:click.prevent' => $click]);
@endphp
@if($type === 'collapse-item')
    <li class="menu-item {{ $active ? 'active' : '' }}">
        <a {{ $attributes }}>
            @if($icon)<span class="menu-icon"><x-rpd::icon :name="$icon"/></span>@endif
            <div class="text-truncate">{{ __($label) ?? $slot }}</div>
        </a>
    </li>
@else
    <a {{ $attributes }}>
        @if($icon)<span class="menu-icon"><x-rpd::icon :name="$icon"/></span>@endif
        <div class="text-truncate">{{ __($label) ?? $slot }}</div>
    </a>
@endif
