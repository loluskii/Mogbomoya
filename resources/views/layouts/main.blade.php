<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
        <title>Mogbomoya</title>
        <meta content="Admin Dashboard" name="description">
        <meta content="Themesbrand" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/images/mobile/logo.png') }}">
      
        @yield('css')
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.partials.nav')
           
            @yield('content')

            @include('layouts.partials.footer')

            @include('layouts.partials.footer-scripts')
          
        </div>
      
        @yield('script')
    </body>
</html>
