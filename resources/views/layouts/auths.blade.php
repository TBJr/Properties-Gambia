<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('pageName')</title>

        <!-- Scripts -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script href="{{ asset('js/auths.js') }}"></script>

        <!-- Styles -->
        <link href="{{ asset('css/auths.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            @include('partials/alert')
            @yield('content')
            @yield('scripts')
        </div>
    </body>
</html>
