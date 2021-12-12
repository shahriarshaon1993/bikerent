<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('site_title', 'Laravel') }}</title>
        <link rel="icon" type="image/png" href="{{ Storage::url(setting('site_favicon')) }}"/>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

        @include('layouts.frontend.partials.header')

        <main role="main">
            @yield('content')

            @include('layouts.frontend.partials.footer')
        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/frontend.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
