{{-- Sneat theme — public area --}}
@extends('layout::app')

@section('main')
    @include('layout::includes.frontend_navbar')

    <div class="container-xxl py-4">
        @yield('main-content')
        {{ $slot ?? '' }}
    </div>
@endsection
