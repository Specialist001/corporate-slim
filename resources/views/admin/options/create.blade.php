@extends('admin.layout')

@section('center_content')
	<div class="col-md-7">
		<form action="{{ route('admin.options.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@component('component.white-box', ['title' => trans('common.titles.options').': '.trans('admin.creating')])
                @include('admin.options._form')
                @slot('bottom')
                    <a href="{{ route('admin.options.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.create')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection
