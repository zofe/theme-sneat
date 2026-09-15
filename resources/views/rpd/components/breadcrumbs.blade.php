{{-- Sneat page header: breadcrumb trail + title of the current page --}}
@php
    $breadcrumbs = $generate();
    $last = $breadcrumbs->last();
@endphp
@if($breadcrumbs->count())
<div class="mb-4" wire:ignore>
    @if($breadcrumbs->count() > 1)
        <ol class="breadcrumb breadcrumb-style1 mb-1">
            @foreach ($breadcrumbs as $crumbs)
                @if ($crumbs->url() && !$loop->last)
                    <li class="{{ $class }}"><a href="{{ $crumbs->url() }}">{{ $crumbs->title() }}</a></li>
                @else
                    <li class="{{ $class }} {{ $active }}" aria-current="page">{{ $crumbs->title() }}</li>
                @endif
            @endforeach
        </ol>
    @endif
    <h4 class="fw-bold mb-0">{{ $last->title() }}</h4>
</div>
@endif
