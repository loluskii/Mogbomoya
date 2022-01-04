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
    <link rel="shortcut icon" href="{{ secure_asset('/images/mobile/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style>
        p {
            font-family: Sen;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            letter-spacing: 0em;
            /* text-align: left; */
        }



        .group:after {
            content: "";
            display: table;
            clear: both;
        }

        .slide-content {
            position: fixed;
            top: 0px;
            left: auto;
            bottom: 0px;
            right: 0px;
            height: 100%;
            width: 220px;
            -webkit-transform: translateX(220px);
            -moz-transform: translateX(220px);
            -ms-transform: translateX(220px);
            -o-transform: translateX(220px);
            transform: translateX(220px);

            -webkit-transition: all 0.25s ease-in-out;
            -moz-transition: all 0.25s ease-in-out;
            transition: all 0.25s ease-in-out;
            z-index: 999999;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .slide-content.is-visible {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transform: translateX(0);
        }

        #wrapper {
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .is-obscured {
            -webkit-transform: translateX(-220px);
            -moz-transform: translateX(-220px);
            -ms-transform: translateX(-220px);
            -o-transform: translateX(-220px);
            transform: translateX(-220px);
        }

        .slide-fade {
            position: fixed;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            -webkit-transition: all 0.15s ease-out 0s;
            -moz-transition: all 0.15s ease-out 0s;
            transition: all 0.15s ease-out 0s;
            opacity: 0;
            /*   background: black; */
            visibility: hidden;
            z-index: 999998;
        }

        .slide-fade.is-visible {
            opacity: 0.4;
            visibility: visible;
        }

        nav.slide-content {
            background-color: #008A69;
        }

        nav.slide-content li {
            border-bottom: 1px solid #333;
        }

        nav.slide-content a {
            display: block;
            padding: 25px 15px;
            text-decoration: none;
        }



        .menu {
            float: right;
        }
    </style>

    @yield('css')
</head>

<body>
    <nav class="slide-content p-3">
        <div class="list-group list-group-flush mt-5 pt-2 justify-content-center">
            <a href="/" class="pb-3"><img src="{{ secure_asset('images/Mogbomoya _White).png')}}" class="img-fluid text-center" style="height: 150px" srcset=""></a>
            <a class="list-group-item list-group-item-action bg-transparent text-white" href="{{ route('event.create') }}">Create Event</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white" href="{{ route('user.events') }}">My Events</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white" href="{{ route('user.edit') }}">My Account</a>
            <a class="list-group-item list-group-item-action p-3" href="{{route('bank.details')}}">Bank account details</a>
            @if(auth()->user()->password != '')
            {{-- request password modal --}}
                <a class="list-group-item list-group-item-action p-3"  id="inputPassword" href="#">Deactivate account</a> 
            @else
                <a class="list-group-item list-group-item-action p-3" onclick="return confirm('Are you sure you want to deactivate this account?') ? initRoute() : '' "  href="#">Deactivate account</a> 
            @endif
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    
            {{-- <a class="list-group-item list-group-item-action p-3" href="#!">Customize your interests</a> --}}
            {{-- <a class="list-group-item list-group-item-action p-3" href="#!">Talk to us</a> --}}
            {{--  --}}
        </div>
    </nav>
    
    <div id="wrapper">
        
            {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white">
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
                                <img src="{{ secure_asset('images/icons/user-image.svg') }}" alt="" srcset="">
                                Appleseed John
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item py-3" href="#">Interests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item py-3" href="#"><img src="{{ secure_asset('images/icons/account.svg') }}"
                                        class="px-2" alt="" srcset=""> Account Settings</a>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}"><img
                                        src="{{ secure_asset('images/icons/logout.svg') }}" class="pr-2" alt="" srcset="">
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
         --}}

        @yield('content')
        
        @include('layouts.partials.footer-scripts')

        


    </div>

    @yield('script')
</body>

</html>
