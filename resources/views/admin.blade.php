{{-- Sneat theme — admin area: vertical menu, detached navbar, content, footer --}}
@extends('layout::app')

@section('main')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layout::includes.admin_sidebar')

            <div class="layout-page">
                @include('layout::includes.admin_navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <x-rpd::breadcrumbs class="breadcrumb-item" active="active" />
                        @stack('page_header')

                        @include('layout::includes.messages')

                        @yield('main-content')
                        {{ $slot ?? '' }}

                        @yield('doc')
                    </div>

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-center py-4 small text-secondary">
                                @stack('footer')
                            </div>
                        </div>
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
