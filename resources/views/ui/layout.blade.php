<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <title>@yield('title', config('app.name'))</title>

    <link rel="icon" type="image/png"   href="{{ asset('icons/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-iconmoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/core/core.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/vendor/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/layouts/layouts-pack.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('ui/apps.css') }}" rel="stylesheet">
    @stack('styles')
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
</head>
<body class="cat__config--vertical cat__menu-left--colorful {{ Request::cookie("menu_left_minified", "cat__menu-left--visible") }}">
{{--<div class="cat__menu-right">--}}
    {{--@yield('menu-right')--}}
{{--</div>--}}
<nav class="cat__menu-left">
    @yield('menu-left')
</nav>
<div class="cat__top-bar">
    @yield('top-bar')
</div>
<div class="cat__content">

    @if (session()->has('success'))
        @component('component.alert', ['type' => 'success'])
            {{ session('success') }}
        @endcomponent
    @endif
    @if (session()->has('warning'))
        @component('component.alert', ['type' => 'warning'])
            {{ session('warning') }}
        @endcomponent
    @endif
    @if (session()->has('danger'))
        @component('component.alert', ['type' => 'danger'])
            {{ session('danger') }}
        @endcomponent
    @endif

    @yield('content')
    {{--<div class="cat__footer">--}}
        {{--@yield('footer')--}}
    {{--</div>--}}
</div>

<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/popper.js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/cookie/plugin.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/autosize/autosize.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // beforeSend: function(){
        //     $("#preloader").show();
        // },
        // complete: function(){
        //     $("#preloader").hide();
        // }
    });
</script>
@stack('scripts')
<script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
</body>
</html>
