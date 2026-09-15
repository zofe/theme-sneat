{{-- Sneat theme — HTML shell (rapyd-admin layout contract, docs/THEMES.md) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed layout-compact">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('rapyd.layout.brand') ?: config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    @if(config('rapyd.layout.favicon'))
        <link rel="icon" href="{{ asset(config('rapyd.layout.favicon')) }}">
    @endif

    @rapydStyles
    @if(config('rapyd.layout.custom_css'))
        <link href="{{ config('rapyd.layout.custom_css') }}" rel="stylesheet">
    @endif
    @livewireStyles
    @stack('head_scripts')
</head>
<body>

@section('main')
    <main class="container-xxl py-4">
        @yield('content')
        {{ $slot ?? '' }}
    </main>
@show

@aiWidget
@livewireScripts
@rapydScripts
@stack('footer_scripts')
</body>
</html>
