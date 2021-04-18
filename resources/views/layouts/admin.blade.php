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
        <link rel="icon" href="{{ asset('images/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- start: Upload Image -->
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">     --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- end: Upload Image -->  

    </head>

    @role('Super-Admin')
        <body class="sidebar-mini" style="height: auto;">
            <div class="wrapper" id="app">
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href={{ url('home') }} class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-none d-sm-inline-block">

                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <p>
                                    <i class="nav-icon fas fa-power-off"></i>
                                    Logout
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href={{ url('home') }} class="brand-link">
                        <img src="{{ asset('images/logoo.ico') }}" alt="Properties Gambia" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <strong class="brand-text front-weight-light">P. G. R. E.</strong>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                @if (auth()->user()->photo == 'avatar.png')
                                    <img src="{{ asset('assets/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                    @else
                                    <img src="{{ asset('assets/profile/') .'/'. auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
                                @endif
                            </div>
                            <div class="info">
                                <a href={{ url('home') }} class="d-block">{{ auth()->user()->fname }} {{ auth()->user()->mname }} {{ auth()->user()->lname }}</a>
                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="{{ url('home') }}" class="nav-link">
                                        <i class="nav-icon fas fa-chalkboard"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('notifications') }}" class="nav-link">
                                    <i class="fas fa-bell nav-icon"></i>
                                    <p>Notifications</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('properties.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-map"></i>
                                        <p>
                                            Properties
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('plot.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-map-marked"></i>
                                        <p>
                                            Plots
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('clients.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Clients
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item has-treeview">
                                        {{-- <a href="#" class="nav-link active"> --}}
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>
                                            Management
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('role.index') }}" class="nav-link">
                                                <i class="fas fa-bomb nav-icon"></i>
                                                <p>Roles</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('permission.index') }}" class="nav-link">
                                                <i class="fas fa-bomb nav-icon"></i>
                                                <p>Permissions</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.index') }}" class="nav-link">
                                                <i class="fas fa-users-cog nav-icon"></i>
                                                <p>Users</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li> 

                                <li class="nav-header">PERSONAL</li>

                                <li class="nav-item">
                                    <a href="{{ route('profile.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user.photo') }}" class="nav-link">
                                    <i class="fas fa-image nav-icon"></i>
                                    <p>Change Profile Photo</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('password.change') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>Change Password</p>
                                    </a>
                                </li>                    
            
                                <li class="nav-header">MISCELLANEOUS</li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-power-off"></i>
                                        <p>
                                            {{ __('Logout') }}
                                        </p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </nav> 
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper" style="min-height: 399px;">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">@yield('pageName')</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">@yield('pageName')</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    
                    <div class="content">
                        <div class="container-fluid">
                            @include('partials/alert')
                            @yield('content')
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        by: <strong><a href="#">Thomas S. Brown</a></strong>
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright © 2020 <a href="https://tbj.gm">Properties Gambia Real Estate</a>.</strong> All rights reserved.
                </footer>
                <div id="sidebar-overlay"></div>
            </div>
            <!-- ./wrapper -->
        </body>
    @endrole

    @role('Admin')
        <body class="sidebar-mini" style="height: auto;">
            <div class="wrapper" id="app">
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href={{ url('home') }} class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-none d-sm-inline-block">

                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <p>
                                    <i class="nav-icon fas fa-power-off"></i>
                                    Logout
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href={{ url('home') }} class="brand-link">
                        <img src="{{ asset('images/logoo.ico') }}" alt="Properties Gambia" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <strong class="brand-text front-weight-light">P. G. R. E.</strong>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                @if (auth()->user()->photo == 'avatar.png')
                                    <img src="{{ asset('assets/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                    @else
                                    <img src="{{ asset('assets/profile/') .'/'. auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
                                @endif
                            </div>
                            <div class="info">
                                <a href={{ url('home') }} class="d-block">{{ auth()->user()->fname }} {{ auth()->user()->mname }} {{ auth()->user()->lname }}</a>
                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>

                        {{-- @if(auth()) --}}
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="{{ url('home') }}" class="nav-link">
                                        <i class="nav-icon fas fa-chalkboard"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('notifications') }}" class="nav-link">
                                    <i class="fas fa-bell nav-icon"></i>
                                    <p>Notifications</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('properties.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-map"></i>
                                        <p>
                                            Properties
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('plot.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-map-marked"></i>
                                        <p>
                                            Plots
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user.client') }}" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Clients
                                        </p>
                                    </a>
                                </li>

                                {{-- @role('Super-Admin') --}}
                                    {{-- @if(auth()->user()->hasPermissionTo('edit user')) --}}
                                    <li class="nav-item has-treeview">
                                        {{-- <a href="#" class="nav-link active"> --}}
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-cogs"></i>
                                            <p>
                                                Management
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('role.index') }}" class="nav-link">
                                                    <i class="fas fa-bomb nav-icon"></i>
                                                    <p>Roles</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('permission.index') }}" class="nav-link">
                                                    <i class="fas fa-bomb nav-icon"></i>
                                                    <p>Permissions</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('user.index') }}" class="nav-link">
                                                    <i class="fas fa-users-cog nav-icon"></i>
                                                    <p>Users</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    {{-- @else --}}
                                        {{-- @if(auth()->user()->hasrole('Admin')) --}}
                                            <li class="nav-item has-treeview">
                                                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                                        <p>
                                                            Client
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                </li>

                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        {{-- <a href="{{ route('user.info') }}" class="nav-link"> --}}
                                                            <i class="fas fa-users-cog nav-icon"></i>
                                                            <p>Users</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        {{-- @endif --}}
                                {{-- @endrole --}}

                            

                                <li class="nav-header">PERSONAL</li>

                                <li class="nav-item">
                                    <a href="{{ route('profile.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user.photo') }}" class="nav-link">
                                    <i class="fas fa-image nav-icon"></i>
                                    <p>Change Profile Photo</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('password.change') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>Change Password</p>
                                    </a>
                                </li>                    
            
                                {{-- <li class="nav-header">MISCELLANEOUS</li> --}}

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-power-off"></i>
                                        <p>
                                            Logout
                                        </p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </nav> 
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper" style="min-height: 399px;">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">@yield('pageName')</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">@yield('pageName')</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            @include('partials/alert')
                            @yield('content')
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        by: <strong><a href="#">Thomas S. Brown</a></strong>
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright © 2020 <a href="https://tbj.gm">Properties Gambia Real Estate</a>.</strong> All rights reserved.
                </footer>
                <div id="sidebar-overlay"></div>
            </div>
            <!-- ./wrapper -->
        </body>
    @endrole

    @role('Client')
        <body class="sidebar-mini" style="height: auto;">
            <div class="wrapper" id="app">
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href={{ url('home') }} class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <!-- Right navbar links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{ Auth::user()->mname }} {{ Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href={{ url('home') }} class="brand-link">
                        <img src="{{ asset('images/logoo.ico') }}" alt="Properties Gambia" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <strong class="brand-text front-weight-light">P. G. R. E.</strong>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                @if (auth()->user()->photo == 'avatar.png')
                                    <img src="{{ asset('assets/img/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
                                    @else
                                    <img src="{{ asset('assets/profile/') .'/'. auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
                                @endif
                            </div>
                            <div class="info">
                                <a href={{ url('home') }} class="d-block">{{ auth()->user()->fname }} {{ auth()->user()->mname }} {{ auth()->user()->lname }}</a>
                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="{{ url('home') }}" class="nav-link">
                                        <i class="nav-icon fas fa-chalkboard"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('notifications') }}" class="nav-link">
                                    <i class="fas fa-bell nav-icon"></i>
                                    <p>Notifications</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('plot.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-map-marked"></i>
                                        <p>
                                            Plots
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('clients.myClient') }}" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            My Assets
                                        </p>
                                    </a>
                                </li>                            

                                <li class="nav-header">PERSONAL</li>

                                <li class="nav-item">
                                    <a href="{{ route('profile.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Profile
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user.photo') }}" class="nav-link">
                                    <i class="fas fa-image nav-icon"></i>
                                    <p>Change Profile Photo</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('password.change') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>Change Password</p>
                                    </a>
                                </li>                    
            
                                <li class="nav-header">MISCELLANEOUS</li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-power-off"></i>
                                        <p>
                                            Logout
                                        </p>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </nav> 
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper" style="min-height: 399px;">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">@yield('pageName')</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">@yield('pageName')</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            @include('partials/alert')
                            @yield('content')
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        by: <strong><a href="#">Thomas S. Brown</a></strong>
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright © 2020 <a href="https://tbj.gm">Properties Gambia Real Estate</a>.</strong> All rights reserved.
                </footer>
                <div id="sidebar-overlay"></div>
            </div>
            <!-- ./wrapper -->
        </body>
    @endrole

</html>
