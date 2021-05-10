<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('pageName')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/approval.css') }}" rel="stylesheet">
    
    <style>
        body {
            /* Location of the image */
            background-image: url(images/house.jpg);
            
            /* Image is centered vertically and horizontally at all times */
            background-position: center center;
            
            /* Image doesn't repeat */
            background-repeat: no-repeat;
            
            /* Makes the image fixed in the viewport so that it doesn't move when 
                the content height is greater than the image height */
            background-attachment: fixed;
            
            /* This is what makes the background image rescale based on its container's size */
            background-size: cover;
            
            /* Pick a solid background color that will be displayed while the background image is loading */
            background-color:#464646;
            
            /* SHORTHAND CSS NOTATION
            * background: url(background-photo.jpg) center center cover no-repeat fixed;
            */
        }

        /* For mobile devices */
        @media only screen and (max-width: 767px) {
            body {
                /* The file size of this background image is 93% smaller
                * to improve page load speed on mobile internet connections */
                background-image: url(images/house.jpg);
            }
        }
    </style>
   
    
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent ">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
            <div class="container">
                <a class="navbar-brand" style="color: black" href="{{ url('/') }}">
                    {{ _('Properties Gambia') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
                </b>
            </div>
        </nav>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('partials/alert')
                <br><br><br>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
