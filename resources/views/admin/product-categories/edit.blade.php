@extends('admin.layout')

@section('center_content')
	<div class="col-md-12">
		<form action="{{ route('admin.product-categories.update', $productCategory) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			@component('component.white-box', ['title' => trans('common.titles.product_categories').': '.trans('admin.editing')])
                @include('admin.product-categories._form')
                @slot('bottom')
                    <a href="{{ route('admin.product-categories.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.save')</button>
                @endslot
            @endcomponent
		</form>
	</div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#delete_image').on('click', function () {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route('admin.product-categories.destroy.image') }}/{{$productCategory->id}}",
                    success: function(response) {
                        if(response.result === "success") {
                            $('#image').remove();
                            return false;
                        } else {
                            alert("{{trans('admin.ajax_error')}}");
                        }
                    },
                    error: function(response) {
                        alert("{{trans('admin.ajax_error')}}");
                    }
                });
            });
            $('#delete_icon').on('click', function () {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route('admin.product-categories.destroy.icon') }}/{{$productCategory->id}}",
                    success: function(response) {
                        if(response.result === "success") {
                            $('#icon').remove();
                            return false;
                        } else {
                            alert("{{trans('admin.ajax_error')}}");
                        }
                    },
                    error: function(response) {
                        alert("{{trans('admin.ajax_error')}}");
                    }
                });
            });
        });
    </script>
@endpush
