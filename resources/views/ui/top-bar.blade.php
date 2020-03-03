{{--<!-- START: top-bar left side -->--}}
<div class="cat__top-bar__left">

    {{--<!-- START: top-bar logo -->--}}
    <div class="cat__top-bar__logo">
        <img src="{{ asset('images/logo__.png') }}" alt="{{ config('app.name') }}">
    </div>
    {{--<!-- END: top-bar logo -->--}}

    {{--<!-- START: top-bar item -->--}}
    {{--<div class="cat__top-bar__item">--}}
        @yield('top-bar-left')
    {{--</div>--}}
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
