@extends('common.menu-left')

{{--@section('logo'){{ asset('images/logo_avtogen.png') }}@endsection--}}

{{--@section('menu-left-items')--}}
@section('left-sidebar')
    <div class="user-profile">
        <div class="dropdown user-pro-body">
            <div class="profile-image">
                <img src="{{ asset('images/users/hanna.jpg') }}" alt="user-img" class="img-circle">
                <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-danger">
                        <i class="fa fa-angle-down"></i>
                    </span>
                </a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
            <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Hanna Gover</a></p>
        </div>
    </div>
    <nav class="sidebar-nav">
        <ul id="side-menu">
            <li>
                <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard <span class="label label-rounded label-info pull-right">3</span></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li> <a href="{{ route('admin.news.index') }}">News</a> </li>
                    <li> <a href="index2.html">Clean Version</a> </li>
                    <li> <a href="index3.html">Analytical Version</a> </li>
                </ul>
            </li>
            <li>
        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-basket fa-fw"></i> <span class="hide-menu"> eCommerce </span></a>
        <ul aria-expanded="false" class="collapse">
            <li> <a href="index4.html">Dashboard</a> </li>
            <li> <a href="products.html">Products</a> </li>
            <li> <a href="product-detail.html">Product Detail</a> </li>
            <li> <a href="product-edit.html">Product Edit</a> </li>
            <li> <a href="product-orders.html">Product Orders</a> </li>
            <li> <a href="product-cart.html">Product Cart</a> </li>
            <li> <a href="product-checkout.html">Product Checkout</a> </li>
        </ul>
    </li>
        </ul>
    </nav>


        {{--<!-- START: menu-left item -->--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == ''? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.home') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-home "></span>--}}
{{--                @lang('admin.nav.home')--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'categories'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.categories.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-list2 "></span>--}}
{{--                @lang('admin.nav.categories')--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'companies'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.companies.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-office "></span>--}}
{{--                @lang('admin.nav.companies')--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'services'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.services.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-wrench "></span>--}}
{{--                @lang('admin.nav.services')--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'bookings'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.bookings.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-clipboard "></span>--}}
{{--                Бронирования--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <hr>--}}

{{--        <li class="cat__menu-left__item {{ $current_route_name == 'users'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.users.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-users "></span>--}}
{{--                @lang('admin.nav.users')--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li class="cat__menu-left__item {{ $current_route_name == 'admins'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.admins.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-user-check "></span>--}}
{{--                @lang('admin.nav.admins')--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="cat__menu-left__item {{ $current_route_name == 'contacts'? 'cat__menu-left__item--active': '' }}">--}}
{{--            <a href="{{ route('admin.contacts.index') }}">--}}
{{--                <span class="cat__menu-left__icon icmn-phone "></span>--}}
{{--                @lang('admin.nav.contacts')--}}
{{--            </a>--}}
{{--        </li>--}}

{{--       --}}

{{--        <li class="cat__menu-left__item cat__menu-left__submenu {{ ($current_route_name == 'load-types' || $current_route_name == 'car-types' || $current_route_name == 'features')? 'cat__menu-left__item--active cat__menu-left__submenu--toggled': '' }}">--}}
{{--            <a href="#" onclick="return false;">--}}
{{--                <span class="cat__menu-left__icon icmn-info"></span>--}}
{{--                @lang('admin.nav.handbooks')--}}
{{--            </a>--}}
{{--            <ul class="cat__menu-left__list" style="{{ ($current_route_name == 'load-types' || $current_route_name == 'car-types' || $current_route_name == 'cargo-types')? 'display: block;': '' }}">--}}
{{--                <li class="cat__menu-left__item {{ $current_route_name == 'car-types'? 'cat__menu-left__item--active': '' }}">--}}
{{--                    <a href="{{ route('admin.car-types.index') }}">--}}
{{--                        <span class="cat__menu-left__icon icmn-truck "></span>--}}
{{--                        @lang('admin.nav.car-types')--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="cat__menu-left__item {{ $current_route_name == 'features'? 'cat__menu-left__item--active': '' }}">--}}
{{--                    <a href="{{ route('admin.features.index') }}">--}}
{{--                        <span class="cat__menu-left__icon icmn-truck "></span>--}}
{{--                        @lang('admin.nav.features')--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--        </li>--}}

        {{--<!-- END: menu-left item with submenu -->--}}
@endsection
