<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>Mogbomoya</title>
        <meta content="Admin Dashboard" name="description">
        <meta content="Themesbrand" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/images/mobile/logo.png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      
        @yield('css')
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-4" style="padding-top: 15px">
                            <a class="nav-link" href="#">Help Center </a>
                        </li>
                        <li class="nav-item dropdown pt-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('images/icons/user-image.svg')}}" alt="" srcset=""> {{auth()->user()->name}} 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img src="{{ asset('images/icons/account.svg') }}"
                                        class="px-2" alt="" srcset=""> Account Settings</a>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}"><img
                                        src="{{ asset('images/icons/logout.svg') }}" class="pr-2" alt="" srcset="">
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
           
            @yield('content')

            @include('layouts.partials.footer')

            @include('layouts.partials.footer-scripts')
          
        </div>
      
        @yield('script')
    </body>
</html>
