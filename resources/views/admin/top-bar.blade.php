@extends('ui.top-bar')

@section('top-bar-left')@endsection
@section('top-bar-right')
    <div class="cat__top-bar__item">
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ \Request::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile.edit')}}" class="dropdown-item"><i class="dropdown-icon icmn-user"></i> @lang('admin.profile')</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item text-danger"><i
                        class="dropdown-icon icmn-exit"></i> @lang('admin.logout')</a>
            </div>
        </div>
    </div>
@endsection
