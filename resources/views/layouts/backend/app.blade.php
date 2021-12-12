<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    // Favicon
    <link rel="icon" type="image/png" href="{{ Storage::url(setting('site_favicon')) }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <link href="{{ asset('main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- for Datatables --}}
    @stack('css')

</head>
<body>
    <div id="app" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- Header Section --}}
        @include('layouts.backend.partials.header')

        {{-- main section --}}
        <div class="app-main">
            {{-- Sidebar --}}
            @include('layouts.backend.partials.sidebar')

            {{-- Main outer --}}
            <div class="app-main__outer">
                {{-- Main inner --}}
                <div class="app-main__inner">

                    @yield('content')

                </div>

                {{-- footer --}}
                @include('layouts.backend.partials.footer')
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/scripts/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
    @stack('js')
</body>
</html>
