{{-- Sneat theme — login, register, password and 2FA pages --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('rapyd.layout.brand') ?: config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @if(config('rapyd.layout.favicon'))
        <link rel="icon" href="{{ asset(config('rapyd.layout.favicon')) }}">
    @endif

    @rapydStyles
    @if(config('rapyd.layout.custom_css'))
        <link href="{{ config('rapyd.layout.custom_css') }}" rel="stylesheet">
    @endif
    @livewireStyles
    @stack('head_scripts')
    @yield('styles')
</head>
<body class="auth-body d-flex flex-column min-vh-100 justify-content-center">

    @yield('main-content')
    {{ $slot ?? '' }}

    @livewireScripts
    @rapydScripts
    @stack('footer_scripts')
    @yield('scripts')
</body>
</html>
