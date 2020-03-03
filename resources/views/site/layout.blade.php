<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <meta name="msapplication-TileColor" content="#151334">
    <meta name="theme-color" content="#151334">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/flaticon/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/gijgo/css/gijgo.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animate/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/slick/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/slicknav/css/slicknav.css') }}" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
</head>
<body>

    <header id="header">
        @yield('header')
    </header>

    @yield('content')

    <footer class="footer">
        @yield('footer')
    </footer>

    <script type="text/javascript" src="{{ asset('vendor/modernizr/js/modernizr-3.5.0.min.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery-3.4.1.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.min.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery-1.12.4.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('vendor/popper/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/owl/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/isotope/js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ajax-form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/waypoints/js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/imagesloaded/js/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/scroll/js/scrollIt.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.scrollUp.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/wow/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/nice-select/js/nice-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.slicknav.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/gijgo/js/gijgo.min.js') }}"></script>

    <!--contact js-->
    <script type="text/javascript" src="{{ asset('vendor/contact/js/contact.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.ajaxchimp.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/mail-script/js/mail-script.js') }}"></script>

    @stack('scripts')

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
