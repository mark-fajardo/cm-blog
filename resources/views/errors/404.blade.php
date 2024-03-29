<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404 - {{ config('app.name') }}</title>

        <!--====== FAVICON ICON =======-->
        <link rel="shortcut icon" type="image/ico" href="//files.chefmorrisdanzen.com/l/img/logo/favicon.png" />

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ mix('css/front.css') }}">
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--- PRELOADER -->
        <div class="preeloader">
            <div class="preloader-spinner"><img src="/img/logo/chef-morris-danzen-FINAL-colored.png"/></div>
        </div>

        <!--SCROLL TO TOP-->
        <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

        <div id="header-component"></div>
        <div id="app"></div>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('/js/jquery-1.12.4.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/modernizr-2.8.3.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/jquery.pogo-slider.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/waypoints.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/wow.min.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/main.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('/js/notFound.js') }}" defer></script>

        @if(config('app.env') === 'production')
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-207398048-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-207398048-1');
            </script>
        @endif
    </body>
</html>
