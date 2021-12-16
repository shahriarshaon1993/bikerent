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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css" integrity="sha512-r9kUVFtJ0e+8WIL8sjTUlHGbTLwlOClXhVqGgu4sb7ILdkBvM2uI+n/Fz3FN8u3VqJX7l9HLiXqXxkx2mZpkvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
        <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body>

        @include('layouts.frontend.partials.header')

        <main role="main">
            @yield('content')

            @include('layouts.frontend.partials.footer')
        </main>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/fontawesome.min.js" integrity="sha512-vF2g7ozd8M2AA8re3eCrfJT2vvrOmIbW9JhodInQHN5Xjg6ec6nJpMJQcwuXm+aOhQze+CrM2rFQLftMtQA+bA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/frontend.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/iziToast.js') }}"></script>
        @include('vendor.lara-izitoast.toast')
        @stack('js')
    </body>
</html>
