<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="All about Chef Morris Danzen and his recipes." />
        <meta name="keywords" content="Video, youtube, facebook, twitter" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--====== FAVICON ICON =======-->
        <link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.png') }}" />

        <title>{{ config('app.name') }} - Home</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('css/front.css') }}">

        <!-- Scripts -->
        <script type="text/javascript" src="{{ mix('/js/jquery-1.12.4.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/modernizr-2.8.3.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/home.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/jquery.pogo-slider.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/waypoints.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/wow.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ mix('/js/main.js') }}" defer></script>
{{--        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js"></script>--}}
{{--        <script type="text/javascript" src="{{ mix('/js/maps.active.js') }}" defer></script>--}}
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--- PRELOADER -->
        <div class="preeloader">
            <div class="preloader-spinner"><i class="fa fa-cutlery"></i></div>
        </div>

        <!--SCROLL TO TOP-->
        <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

        <div id="header-component"></div>
        <div id="app"></div>
    </body>
</html>
