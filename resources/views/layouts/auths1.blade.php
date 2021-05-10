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
        <link href="{{ asset('css/auths1.css') }}" rel="stylesheet">
    
        <style>
            .text-left {
                text-align: left !important;
            }
            .text-muted {
            color: #6c757d !important;
            font-family: 'Lucida Sans';
            font-weight: 500;
            font-size: 1.3rem;
            }
        </style>
    </head>

    <body>
        <div id="app">
            @yield('content')
            @yield('scripts')
        </div>
    </body>
</html>
