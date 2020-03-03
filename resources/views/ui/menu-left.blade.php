{{--<!-- START: menu-left icon -->--}}
<div class="cat__menu-left__lock cat__menu-left__action--menu-toggle">
    <div class="cat__menu-left__pin-button">
        <div><!-- --></div>
    </div>
</div>
{{--<!-- END: menu-left icon -->--}}

{{--<!-- START: menu-left logo -->--}}
<div class="cat__menu-left__logo">
    <img src="@yield('logo', asset('images/logo__.png'))" alt="{{ config('app.name') }}">
</div>
{{--<!-- END: menu-left logo -->--}}

<div class="cat__menu-left__inner ps">
    {{--<!-- START: menu-left root list -->--}}
    <ul class="cat__menu-left__list cat__menu-left__list--root">
        @yield('menu-left-items')
    </ul>
    {{--<!-- END: menu-left root list -->--}}
</div>

@push('styles')
    <link href="{{ asset('ui/menu-left/menu-left.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('ui/menu-left/menu-left.js') }}"></script>
@endpush
