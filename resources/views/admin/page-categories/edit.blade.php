@extends('admin.layout')

@section('center_content')
	<div class="col-md-12">
		<form action="{{ route('admin.page-categories.update', $pageCategory) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			@component('component.white-box', ['title' => trans('admin.titles.page_categories').': '.trans('admin.editing')])
                @include('admin.page-categories._form')
                @slot('bottom')
                    <a href="{{ route('admin.page-categories.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.save')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection

@push('scripts')
    <script>
        $(function () {

        });
    </script>
@endpush
