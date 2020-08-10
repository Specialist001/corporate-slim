@extends('admin.layout')

@section('center_content')
    <div class="col-md-12">
        @component('component.white-box', ['title' => trans('common.titles.brands')])
            @slot('buttons')
                <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-primary ml-2">
                    <span class="d-none d-sm-inline-block">@lang('admin.create')</span> <i class="icmn-plus"></i>
                </a>
            @endslot
            @if($brands->isNotEmpty())
                <div class="table-responsive">
                    <table class="table color-table primary-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('admin.thumb')</th>
                            <th>@lang('admin.on_main')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.active')</th>
                            <th class="text-nowrap">@lang('admin.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.brands.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ $item->logoUrl() }}" class="img-thumbnail" style="width:100px">
                                </td>
                                <td>{{ $item->on_main }}</td>
                                <td>{{ $item->order }}</td>
                                <td>
                                    @if($item->active)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Not active</span>
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.brands.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <form action="{{ route('admin.brands.destroy', $item) }}" class="dib" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn" onclick="return confirm('@lang('admin.destroy_confirm')');" data-toggle="tooltip" data-placement="top" title="@lang('admin.destroy')">
                                            <i class="fa fa-close text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @slot('bottom')
                @include('common.pagination', ['data' => $brands])
            @endslot

        @endcomponent
    </div>
@endsection
