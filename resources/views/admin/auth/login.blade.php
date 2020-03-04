@extends('common.empty')
@section('content')

    <div class="login-box">
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
        <div class="white-box">
            <form id="form-validation" name="form-validation" action="{{ route('admin.auth.login') }}" method="POST">
                @csrf
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="username" class="form-control" name="username" type="text" placeholder="@lang('admin.username')" value="{{ old('username', '') }}" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control password" name="password" id="password" type="password" required placeholder="@lang('admin.password')">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" name="remember" type="checkbox">
                            <label for="checkbox-signup"> @lang('admin.remember') </label>
                        </div>
{{--                      <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>--}}
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">@lang('admin.enter')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@component('component.password-stacks')@endcomponent
