<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <title>@yield('title', config('app.name'))</title>

    <meta name="msapplication-TileColor" content="#151334">
    <meta name="theme-color" content="#151334">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('vendor/owl/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animate/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pretty-checkbox/css/pretty-checkbox.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('shop/css/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('vendor/magnific-popup/css/magnific-popup.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('shop/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/regular.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('shop/css/fontawesome.css') }}" rel="stylesheet">

    {{--    <link href="{{ asset('vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('vendor/nice-select/css/nice-select.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('vendor/flaticon/css/flaticon.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('vendor/gijgo/css/gijgo.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('vendor/slick/css/slick.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('vendor/slicknav/css/slicknav.css') }}" rel="stylesheet">--}}

    <!-- Styles -->
    @stack('styles')
</head>
<body>
    <header id="header">
        @yield('header')
    </header>
        @yield('basket')

        @yield('content')

    <footer class="wow animated fadeIn">
        @yield('footer')
    </footer>

    <script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/popper/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/owl/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/wow/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/pace/js/pace.js') }}"></script>

    @stack('scripts')

    <script type="text/javascript" src="{{ asset('shop/js/main.js') }}"></script>

</body>
</html>
