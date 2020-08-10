@extends('admin.layout')

@section('center_content')
    <div class="col-md-12">
        <form action="{{ route('admin.brands.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @component('component.white-box', ['title' => trans('common.titles.brand').': '.trans('admin.creating')])
                @include('admin.brands._form')
                @slot('bottom')
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-danger float-left">@lang('admin.back')</a>
                    <button class="btn btn-primary float-right">@lang('admin.create')</button>
                @endslot
            @endcomponent
        </form>
    </div>
@endsection
