@extends('ui.menu-left')

@section('logo'){{ asset('images/logo_avtogen.png') }}@endsection

@section('menu-left-items')

        {{--<!-- START: menu-left item -->--}}
        <li class="cat__menu-left__item {{ $current_route_name == ''? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.home') }}">
                <span class="cat__menu-left__icon icmn-home "></span>
                @lang('admin.nav.home')
            </a>
        </li>
        <li class="cat__menu-left__item {{ $current_route_name == 'categories'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.categories.index') }}">
                <span class="cat__menu-left__icon icmn-list2 "></span>
                @lang('admin.nav.categories')
            </a>
        </li>
        <li class="cat__menu-left__item {{ $current_route_name == 'companies'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.companies.index') }}">
                <span class="cat__menu-left__icon icmn-office "></span>
                @lang('admin.nav.companies')
            </a>
        </li>
        <li class="cat__menu-left__item {{ $current_route_name == 'services'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.services.index') }}">
                <span class="cat__menu-left__icon icmn-wrench "></span>
                @lang('admin.nav.services')
            </a>
        </li>
        <li class="cat__menu-left__item {{ $current_route_name == 'bookings'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.bookings.index') }}">
                <span class="cat__menu-left__icon icmn-clipboard "></span>
                Бронирования
            </a>
        </li>
        <hr>

        <li class="cat__menu-left__item {{ $current_route_name == 'users'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.users.index') }}">
                <span class="cat__menu-left__icon icmn-users "></span>
                @lang('admin.nav.users')
            </a>
        </li>
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'cars'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.cars.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-truck "></span>--}}
{{--                @lang('admin.nav.cars')--}}
{{--            </a>--}}
{{--        </li>--}}


        <li class="cat__menu-left__item {{ $current_route_name == 'admins'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.admins.index') }}">
                <span class="cat__menu-left__icon icmn-user-check "></span>
                @lang('admin.nav.admins')
            </a>
        </li>
        <li class="cat__menu-left__item {{ $current_route_name == 'contacts'? 'cat__menu-left__item--active': '' }}">
            <a href="{{ route('admin.contacts.index') }}">
                <span class="cat__menu-left__icon icmn-phone "></span>
                @lang('admin.nav.contacts')
            </a>
        </li>

        {{--<!-- END: menu-left item -->--}}

        {{--<!-- START: menu-left item divider-->--}}
        {{--<li class="cat__menu-left__divider"><!-- --></li>--}}
        {{--<!-- END: menu-left item divider -->--}}

        {{--<!-- START: menu-left item with submenu -->--}}

        <li class="cat__menu-left__item cat__menu-left__submenu {{ ($current_route_name == 'load-types' || $current_route_name == 'car-types' || $current_route_name == 'features')? 'cat__menu-left__item--active cat__menu-left__submenu--toggled': '' }}">
            <a href="#" onclick="return false;">
                <span class="cat__menu-left__icon icmn-info"></span>
                @lang('admin.nav.handbooks')
            </a>
            <ul class="cat__menu-left__list" style="{{ ($current_route_name == 'load-types' || $current_route_name == 'car-types' || $current_route_name == 'cargo-types')? 'display: block;': '' }}">
                <li class="cat__menu-left__item {{ $current_route_name == 'car-types'? 'cat__menu-left__item--active': '' }}">
                    <a href="{{ route('admin.car-types.index') }}">
                        <span class="cat__menu-left__icon icmn-truck "></span>
                        @lang('admin.nav.car-types')
                    </a>
                </li>

                <li class="cat__menu-left__item {{ $current_route_name == 'features'? 'cat__menu-left__item--active': '' }}">
                    <a href="{{ route('admin.features.index') }}">
                        <span class="cat__menu-left__icon icmn-truck "></span>
                        @lang('admin.nav.features')
                    </a>
                </li>
{{--                <li class="cat__menu-left__item {{ $current_route_name == 'cargo-types'? 'cat__menu-left__item--active': '' }}">--}}
{{--                    <a href="{{ route('admin.cargo-types.index') }}">--}}
{{--                        <span class="cat__menu-left__icon icmn-box-add "></span>--}}
{{--                        @lang('admin.nav.cargo-types')--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="cat__menu-left__item {{ $current_route_name == 'load-types'? 'cat__menu-left__item--active': '' }}">--}}
{{--                    <a href="{{ route('admin.load-types.index') }}">--}}
{{--                        <span class="cat__menu-left__icon icmn-download "></span>--}}
{{--                        @lang('admin.nav.load-types')--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>

        {{--<!-- END: menu-left item with submenu -->--}}
@endsection
