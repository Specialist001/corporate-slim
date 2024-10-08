@extends('common.top-bar')

@section('top-bar-left')
    <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-bars"></i>
    </a>
    <div class="top-left-part">
        <a class="logo" href="/">
            <b>
                <img src="{{ asset('images/logo-cubic.png') }}" alt="home" />
            </b>
            <span 
                @if(Cookie::get('menu_left_minified') !== null)
                style="display: none"
                @endif
            ><img src="{{ asset('images/logo-text.png') }}" alt="homepage" class="dark-logo" /></span>
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li>
            <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
        </li>
        <li>
            <form role="search" class="app-search hidden-xs">
                <i class="icon-magnifier"></i>
                <input type="text" placeholder="Search..." class="form-control">
            </form>
        </li>
    </ul>
    <ul class="nav navbar-top-links navbar-right pull-right">
        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                <i class="icon-speech"></i>
                <span class="badge badge-xs badge-danger">6</span>
            </a>
            <ul class="dropdown-menu mailbox animated bounceInDown">
                <li>
                    <div class="drop-title">You have 4 new messages</div>
                </li>
                <li>
                    <div class="message-center">
                        <a href="javascript:void(0);">
                            <div class="user-img">
                                <img src="{{ asset('images/users/1.jpg') }}" alt="user" class="img-circle">
                                <span class="profile-status online pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5>Pavan kumar</h5>
                                <span class="mail-desc">Just see the my admin!</span>
                                <span class="time">9:30 AM</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);">
                            <div class="user-img">
                                <img src="{{ asset('images/users/2.jpg') }}" alt="user" class="img-circle">
                                <span class="profile-status busy pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5>Sonu Nigam</h5>
                                <span class="mail-desc">I've sung a song! See you at</span>
                                <span class="time">9:10 AM</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);">
                            <div class="user-img">
                                <img src="{{ asset('images/users/3.jpg') }}" alt="user" class="img-circle"><span class="profile-status away pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5>Arijit Sinh</h5>
                                <span class="mail-desc">I am a singer!</span>
                                <span class="time">9:08 AM</span>
                            </div>
                        </a>
                        <a href="javascript:void(0);">
                            <div class="user-img">
                                <img src="{{ asset('images/users/4.jpg') }}" alt="user" class="img-circle">
                                <span class="profile-status offline pull-right"></span>
                            </div>
                            <div class="mail-contnet">
                                <h5>Pavan kumar</h5>
                                <span class="mail-desc">Just see the my admin!</span>
                                <span class="time">9:02 AM</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="text-center" href="javascript:void(0);">
                        <strong>See all notifications</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                <i class="icon-calender"></i>
                <span class="badge badge-xs badge-danger">3</span>
            </a>
            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                <li>
                    <a href="javascript:void(0);">
                        <div>
                            <p>
                                <strong>Task 1</strong>
                                <span class="pull-right text-muted">40% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);">
                        <div>
                            <p>
                                <strong>Task 2</strong>
                                <span class="pull-right text-muted">20% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);">
                        <div>
                            <p>
                                <strong>Task 3</strong>
                                <span class="pull-right text-muted">60% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="javascript:void(0);">
                        <div>
                            <p>
                                <strong>Task 4</strong>
                                <span class="pull-right text-muted">80% Complete</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="javascript:void(0);">
                        <strong>See All Tasks</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="right-side-toggle">
            <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                <i class="icon-settings"></i>
            </a>
        </li>
    </ul>
@endsection
{{--@section('top-bar-right')--}}
{{--    <div class="cat__top-bar__item">--}}
{{--        <div class="dropdown">--}}
{{--            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                {{ \Request::user()->name }}--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                <a href="{{ route('admin.profile.edit')}}" class="dropdown-item"><i class="dropdown-icon icmn-user"></i> @lang('admin.profile')</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item text-danger"><i--}}
{{--                        class="dropdown-icon icmn-exit"></i> @lang('admin.logout')</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
