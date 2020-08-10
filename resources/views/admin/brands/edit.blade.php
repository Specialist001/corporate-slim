@extends('admin.layout')

@section('center_content')
    <div class="col-md-12">
        <form action="{{ route('admin.brands.update', $brand) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @component('component.white-box', ['title' => trans('common.titles.brand').': '.trans('admin.editing')])
                @include('admin.brands._form')
                @slot('bottom')
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-success float-right">@lang('admin.save')</button>
                @endslot
            @endcomponent
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#delete_logo').on('click', function () {
                $.ajax({
                    method: "DELETE",
                    url: "{{ route('admin.brands.destroy.logo') }}/{{$brand->id}}",
                    success: function(response) {
                        if(response.result === "success") {
                            $('#logo').remove();
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
