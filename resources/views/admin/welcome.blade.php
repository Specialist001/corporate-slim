@extends('admin.layout')

@section('center_content')

    <div class="row m-0">
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">154</h3>
                    <p class="info-text font-12">Bookings</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">Target<span class="label label-rounded label-success">300</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-comment-text-outline"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">68</h3>
                    <p class="info-text font-12">Complaints</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">Total Pending<span class="label label-rounded label-danger">154</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-coin"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">&#36;9475</h3>
                    <p class="info-text font-12">Earning</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">March : <span class="text-blue font-semibold">&#36;514578</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box b-r-0">
            <div class="media">
                <div class="media-left p-r-5">
                    <div id="earning" class="e" data-percent="60">
                        <div id="pending" class="p" data-percent="55"></div>
                        <div id="booking" class="b" data-percent="50"></div>
                    </div>
                </div>
                <div class="media-body">
                    <h2 class="text-blue font-22 m-t-0">Report</h2>
                    <ul class="p-0 m-b-20">
                        <li><i class="fa fa-circle m-r-5 text-primary"></i>60% Earnings</li>
                        <li><i class="fa fa-circle m-r-5 text-primary"></i>55% Pending</li>
                        <li><i class="fa fa-circle m-r-5 text-info"></i>50% Bookings</li>
                    </ul>
                </div>
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
