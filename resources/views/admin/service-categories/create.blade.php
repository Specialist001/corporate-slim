@extends('admin.layout')

@section('center_content')
	<div class="col-md-12">
		<form action="{{ route('admin.service-categories.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@component('component.white-box', ['title' => trans('admin.titles.service-category').': '.trans('admin.creating')])
                @include('admin.service-categories._form')
                @slot('bottom')
                    <a href="{{ route('admin.service-categories.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.create')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection