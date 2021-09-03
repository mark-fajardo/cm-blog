@extends('app')
@section('body')
    <body data-state="{{ $state }}">
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

        <script type="text/javascript" src="{{ mix('/js/home.js') }}" defer></script>
    </body>
@endsection
