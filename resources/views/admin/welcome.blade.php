@extends('admin.layout')

@section('center_content')
    <div class=" col-md-12 col-lg-10 offset-lg-1">
        <h4>Сегодня</h4>
        <div class="row">
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.bookings.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-success">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\TruckBookings\Models\TruckBooking::whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-clipboard  "></i>--}}
                        </div>
                        <span class=" d-block">Бронирований</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.users.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-primary">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Users\Models\User::whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-users  "></i>--}}
                        </div>
                        <span class=" d-block">Пользователей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.cars.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-info">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Cars\Models\Car::whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-truck  "></i>--}}
                        </div>
                        <span class=" d-block">Автомобилей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.companies.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-warning">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Companies\Models\Company::whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-office  "></i>--}}
                        </div>
                        <span class=" d-block">Компаний</span>
                    </div>
{{--                </a>--}}
            </div>
        </div>
    </div>

    <div class=" col-md-12 col-lg-10 offset-lg-1">
        <h4>За последние 7 дней</h4>
        <div class="row">
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.bookings.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-success">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\TruckBookings\Models\TruckBooking::whereBetween('created_at', [date('Y-m-d 00:00:00', now()->subDays(7)->timestamp), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-clipboard  "></i>--}}
                        </div>
                        <span class=" d-block">Бронирований</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.users.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-primary">
                        <div class="mr-2 mb-2 font-size-26  d-block">
                            {{ \App\Domain\Users\Models\User::whereBetween('created_at', [date('Y-m-d 00:00:00', now()->subDays(7)->timestamp), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-users  "></i>
                        </div>
                        <span class=" d-block">Пользователей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.cars.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-info">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Cars\Models\Car::whereBetween('created_at', [date('Y-m-d 00:00:00', now()->subDays(7)->timestamp), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-truck  "></i>--}}
                        </div>
                        <span class=" d-block">Автомобилей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.companies.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-warning">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Companies\Models\Company::whereBetween('created_at', [date('Y-m-d 00:00:00', now()->subDays(7)->timestamp), date('Y-m-d 23:59:59')])->count() }} <i class="icmn-office  "></i>--}}
                        </div>
                        <span class=" d-block">Компаний</span>
                    </div>
{{--                </a>--}}
            </div>
        </div>
    </div>

    <div class=" col-md-12 col-lg-10 offset-lg-1">
        <h4>Всего</h4>
        <div class="row">
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.bookings.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-success">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\TruckBookings\Models\TruckBooking::count() }} <i class="icmn-clipboard  "></i>--}}
                        </div>
                        <span class=" d-block">Бронирований</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.users.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-primary">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Users\Models\User::count() }} <i class="icmn-users  "></i>--}}
                        </div>
                        <span class=" d-block">Пользователей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.cars.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-info">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Cars\Models\Car::count() }} <i class="icmn-truck  "></i>--}}
                        </div>
                        <span class=" d-block">Автомобилей</span>
                    </div>
{{--                </a>--}}
            </div>
            <div class="col-6 col-lg-3">
{{--                <a href="{{ route('admin.companies.index') }}">--}}
                    <div class="p-5 mb-3 text-center card-badge text-warning">
                        <div class="mr-2 mb-2 font-size-26  d-block">
{{--                            {{ \App\Domain\Companies\Models\Company::count() }} <i class="icmn-office  "></i>--}}
                        </div>
                        <span class=" d-block">Компаний</span>
                    </div>
{{--                </a>--}}
            </div>
        </div>
    </div>
@endsection
