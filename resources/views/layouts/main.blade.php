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
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap-side-modals.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script> --}}

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
    @auth
    <nav class="slide-content p-3">
        <div class="list-group list-group-flush mt-5 pt-2 justify-content-center">
            <a href="/" class="pb-3"><img src="{{ secure_asset('images/Mogbomoya _White).png')}}"
                    class="img-fluid text-center" style="height: 120px" srcset=""></a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('events.near') }}">Find Events Near Me</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('event.create') }}">Create Event</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('user.events') }}">My Events</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('user.collections') }}">Bookmarks</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('user.edit') }}">My Account</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white" href="{{route('logout')}}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </nav>
    @endauth

    @guest
    <nav class="slide-content p-3">
        <div class="list-group list-group-flush mt-5 pt-2 justify-content-center">
            <a href="/" class="pb-3"><img src="{{ secure_asset('images/Mogbomoya _White).png')}}"
                    class="img-fluid text-center" style="height: 150px" srcset=""></a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('login.view') }}">Sign In</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('event.create') }}">Create Event</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{ route('events.near') }}">Find Events Near Me</a>
            <a class="list-group-item list-group-item-action bg-transparent text-white"
                href="{{route('help-center')}}">Help Center </a>
        </div>
    </nav>
    @endguest


    <div class="slide-fade"></div>
    <div id="wrapper">
        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')

        @include('layouts.partials.footer-scripts')

    </div>

    @yield('script')

</body>

</html>