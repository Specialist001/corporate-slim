@extends('common.empty')
@section('content')

    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" action="index.html">
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="cat__pages__login" style="background-image: url('{{ asset('images/login_bg_1.jpg') }}');">
        <div class="cat__pages__login__block">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cat__pages__login__block__promo text-white text-center">
                        <h1 class="mb-3">
                            <span>@lang('admin.login_title', ['appName' => config('app.name')])</span>
                        </h1>
                        <p>@lang('admin.login_text')</p>
                    </div>
                    <div class="cat__pages__login__block__inner">
                        <div class="cat__pages__login__block__form">
                            <div class="row">
                                <div class="col-md-12">
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
                                    @if (count($errors) > 0 || session()->has('danger'))
                                        @component('component.alert', ['type' => 'danger'])
                                            <div>
                                                {{ session('danger') }}
                                            </div>
                                            @foreach ($errors->all() as $error)
                                                <div>{{ $error }}</div>
                                            @endforeach
                                        @endcomponent
                                    @endif
                                </div>
                            </div>
                            <form id="form-validation" name="form-validation" action="{{ route('admin.auth.login') }}"
                                  method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="username">@lang('admin.username')</label>
                                    <input id="username" class="form-control " autofocus required
                                           name="username" type="text" value="{{ old('username', '') }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">@lang('admin.password')</label>
                                    <div class="input-append input-group"><input
                                            class="form-control password"
                                            name="password"  required
                                            id="password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember">
                                                    @lang('admin.remember')
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary mr-3">@lang('admin.enter')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@component('component.password-stacks')@endcomponent
