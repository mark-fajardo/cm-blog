<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="{{ config('app.google_site_verification') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! SEO::generate(true) !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="//files.chefmorrisdanzen.com/img/logo/favicon.png" />

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/front.css') }}">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('/js/jquery-1.12.4.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/modernizr-2.8.3.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.pogo-slider.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/waypoints.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/wow.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/main.js') }}" defer></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                { pageLanguage: "en" },
                "google_translate_element"
            );
        }
    </script>
    <script
        type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    ></script>
</head>
<body data-state="{{ $state }}">

    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"><img src="/img/logo/chef-morris-danzen-FINAL-colored.png"/></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    @yield('body')

</body>
</html>
