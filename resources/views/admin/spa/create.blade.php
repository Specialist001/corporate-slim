@extends('admin.layout')

@section('center_content')
<div id="app">
	<div class="col-md-12">
		<form action="/news" method="post" enctype="multipart/form-data">
			@csrf
			{{-- @component('component.white-box', ['title' => trans('admin.titles.news').': '.trans('admin.creating')])
                @include('admin.news._form')
                @slot('bottom')
                    <a href="{{ route('admin.news.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.create')</button>
                @endslot
            @endcomponent --}}
			<div class="form-group">
				<label for="name" class="">Name:</label>
				<input type="text" id="name" name="name" class="form-control" v-model="name">
			</div>
			<div class="form-group">
				<label for="description" class="">Description:</label>
				<input type="text" id="description" name="description" class="form-control" v-model="description">
			</div>

			<div class="control">
				<button class="button is-primary">Create</button>
			</div>
		</form>
	</div>
</div>
@endsection