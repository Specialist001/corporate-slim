@extends('admin.layout')

@section('center_content')
	<div class="col-md-7">
		<form action="{{ route('admin.options.update', $option) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			@component('component.white-box', ['title' => trans('common.titles.options').': '.trans('admin.editing')])
                @include('admin.options._form')
                @slot('bottom')
                    <a href="{{ route('admin.options.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.save')</button>
                @endslot
            @endcomponent
		</form>
	</div>
    <div class="col-md-5">
        @component('component.white-box', ['title' => trans('common.titles.options')])
            @include('admin.options._option_values')
            @slot('bottom')
{{--                <a href="{{ route('admin.options.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>--}}
{{--                <button class="btn btn-primary float-right">@lang('admin.save')</button>--}}
            @endslot
        @endcomponent
    </div>
@endsection
