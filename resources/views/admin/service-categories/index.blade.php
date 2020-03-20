@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('admin.titles.service_categories')])
		@slot('buttons')
		<a href="{{ route('admin.service-categories.create') }}" class="btn btn-sm btn-primary ml-2">
			<span class="d-none d-sm-inline-block">@lang('admin.create')</span> <i class="icmn-plus"></i>
		</a>
	    @endslot
		@if($serviceCategories->isNotEmpty())
			<div class="table-responsive">
                <table class="table color-table primary-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('admin.parent_category')</th>
                            <th>@lang('admin.icon')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.active')</th>
                            <th class="text-nowrap">@lang('admin.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($serviceCategories as $item)
                    		<tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.service-categories.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td>@if($item->parent)
                                    {{ $item->parent->title }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ $item->iconUrl() }}" class="img-thumbnail" style="width:100px">
                                </td>
                                <td>{{ $item->order }}</td>
                                <td>
                                	@if($item->active)
                                		<span class="label label-success">Active</span>
                            		@else
                            			<span class="label label-danger">Not active</span>
                        			@endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.service-categories.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    {{-- <a href="#" data-toggle="tooltip" data-original-title="@lang('admin.delete')"> <i class="fa fa-close text-danger"></i> </a> --}}
                                    <form action="{{ route('admin.service-categories.destroy', $item) }}" class="dib" method="post">
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
    		@include('common.pagination', ['data' => $serviceCategories])
		@endslot

	@endcomponent
</div>
@endsection
