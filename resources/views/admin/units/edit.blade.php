@extends('admin.layout')

@section('center_content')
	<div class="col-md-12">
		<form action="{{ route('admin.units.update', $unit) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			@component('component.white-box', ['title' => trans('common.titles.unit').': '.trans('admin.editing')])
                @include('admin.units._form')
                @slot('bottom')
                    <a href="{{ route('admin.units.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-success float-right">@lang('admin.save')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection
