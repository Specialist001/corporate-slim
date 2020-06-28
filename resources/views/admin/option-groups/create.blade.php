@extends('admin.layout')

@section('center_content')
	<div class="col-md-12">
		<form action="{{ route('admin.option-groups.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@component('component.white-box', ['title' => trans('common.titles.option_groups').': '.trans('admin.creating')])
                @include('admin.option-groups._form')
                @slot('bottom')
                    <a href="{{ route('admin.option-groups.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.create')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection
