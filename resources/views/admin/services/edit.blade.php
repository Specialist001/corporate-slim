@extends('admin.layout')

@section('center_content')
    <div class="col-md-12">
        <form action="{{ route('admin.services.update', $service) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @component('component.white-box', ['title' => trans('admin.titles.services').': '.trans('admin.editing')])
                @include('admin.services._form')
                @slot('bottom')
                    <a href="{{ route('admin.services.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
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
                    url: "{{ route('admin.services.destroy.image') }}/{{$service->id}}",
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
                    url: "{{ route('admin.services.destroy.icon') }}/{{$service->id}}",
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
