<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <title>@yield('title', config('app.name')) Admin</title>

{{--    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icons/apple-icon-57x57.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icons/apple-icon-60x60.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icons/apple-icon-72x72.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icons/apple-icon-76x76.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icons/apple-icon-114x114.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icons/apple-icon-120x120.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icons/apple-icon-144x144.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icons/apple-icon-152x152.png') }}">--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-icon-180x180.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('icons/android-icon-192x192.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icons/favicon-96x96.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">--}}
{{--    <link rel="manifest" href="{{ asset('icons/manifest.json') }}">--}}
    <meta name="msapplication-TileColor" content="#151334">
{{--    <meta name="msapplication-TileImage" content="{{ asset('icons/ms-icon-144x144.png') }}">--}}
    <meta name="theme-color" content="#151334">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <!-- ===== Plugin CSS ===== -->
    <link href="{{ asset('vendor/chartist-js/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/chartist-plugin-tooltip-master/css/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="{{ asset('vendor/animate/css/animate.css') }}" rel="stylesheet">
    <!-- ===== Toast CSS ===== -->
    <link href="{{ asset('admin/toast/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{ asset('admin/admin.css') }}" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    @stack('styles')

</head>
<body class="{{ Request::cookie("menu_left_minified") }}">
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        @yield('top-bar')
    </nav>

    <!-- ===== Left-Sidebar ===== -->
    <aside class="sidebar">
        @yield('menu-left')
    </aside>
    <!-- ===== Left-Sidebar-End ===== -->

    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        @if (session()->has('success'))
            @component('component.alert',
            ['type' => 'success', 'icon' => 'success', 'position' => 'top-right'])
                {{ session('success') }}
            @endcomponent
        @endif
        @if (session()->has('warning'))
            @component('component.alert',
            ['type' => 'warning', 'icon' => 'warning', 'position' => 'top-right'])
                {{ session('warning') }}
            @endcomponent
        @endif
        @if (session()->has('danger'))
            @component('component.alert',
            ['type' => 'danger', 'icon' => 'danger', 'position' => 'top-right'])
                {{ session('danger') }}
            @endcomponent
        @endif

        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ===== Page-Content-End ===== -->

</div>

<script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/popper/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('vendor/chartist-plugin-tooltip-master/js/chartist-plugin-tooltip.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('vendor/cookie/plugin.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('vendor/autosize/autosize.min.js') }}"></script>--}}
<!-- ===== Slimscroll JavaScript ===== -->
<script type="text/javascript" src="{{ asset('vendor/jquery/js/jquery.slimscroll.js') }}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script type="text/javascript" src="{{ asset('admin/sidebarmenu.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugin.js') }}"></script>
<script src="{{ asset('admin/toast/js/jquery.toast.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="{{ asset('admin/custom.js') }}"></script>
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
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
