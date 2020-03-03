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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
