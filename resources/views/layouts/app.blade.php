<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote-bs4.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">
    <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head> 
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" >
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
                </div>
            </div>
        </nav>
         <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="data:image/jpeg;base64,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" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Car Auction</span>
    </a>


    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
          <a href="{{ route('home')}}" class="nav-link active">
             <!--  <i class="nav-icon fas fa-user-alt"></i> -->
              <i class="fas fa-users"></i>
              <p>
              Dashboard 
              </p>  
            </a>
          </li>      
      </ul>
    </nav>



    
      <!-- /.sidebar-menu -->
  </aside>
            <div class="content-wrapper">  
              <main class="py-4">
                @yield('content')
              </main>
            </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>  
    </div>
 <script src="{{ asset('js/daterangepicker.js') }}" defer></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('js/sparkline.js') }}" defer></script>
<script src="{{ asset('js/jquery.knob.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}" defer></script>
<script src="{{ asset('js/demo.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</body>
</html> 
