<div class="navbar-header">

    @yield('top-bar-left')
    <div class="top-left-part">
        <a class="logo" href="index.html">
            <b>
                <img src="../plugins/images/logo.png" alt="home" />
            </b>
            <span>
                <img src="../plugins/images/logo-text.png" alt="homepage" class="dark-logo" />
            </span>
        </a>
    </div>
</div>
<div class="cat__top-bar__left">

    {{--<!-- START: top-bar logo -->--}}
    <div class="cat__top-bar__logo">
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
    </div>
    {{--<!-- END: top-bar logo -->--}}

    {{--<!-- START: top-bar item -->--}}
    @yield('top-bar-left')
    {{--<!-- END: top-bar item -->--}}

</div>
{{--<!-- END: top-bar left side -->--}}

{{--<!-- START: top-bar right side -->--}}
<div class="cat__top-bar__right">

    {{--<!-- START: top-bar item  -->--}}
    {{--<div class="cat__top-bar__item">--}}
    @yield('top-bar-right')
    {{--</div>--}}
    {{--<!-- END: top-bar item -->--}}
</div>
{{--<!-- END: top-bar right side -->--}}

@push('styles')
    <link href="{{ asset('ui/top-bar.css') }}" rel="stylesheet">
@endpush
