@props(['icon' => null, 'label' => null, 'route' => null, 'url' => null, 'href' => null, 'click' => null, 'params' => [], 'active' => false])
@php
    $active = item_active($active, $route, $params, $url);
@endphp
<li class="menu-item {{ $active ? 'active' : '' }}">
    <x-rpd::nav-link :icon="$icon" :label="$label" :route="$route" :url="$url" :href="$href" :click="$click" :params="$params" :attributes="$attributes" fromItem="1" />
</li>
