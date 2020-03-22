@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('admin.titles.page_categories')])
		@slot('buttons')
            @component('component.modal', ['id' => 'filter', 'class' => 'btn btn-sm btn-secondary ml-2'])
                @slot('label')
                    <i class="ti-filter"></i>
                @endslot
                @slot('title')
                    @lang('admin.filters')
                @endslot

                <div id="filters">
                    <form action="{{ route('admin.page-categories.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id">
                                        <small>@lang('validation.attributes.id')</small>
                                    </label>
                                    <input class="form-control" name="id" id="id" type="number" step="1" min="1" value="{{ $filters['id'] ?? '' }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        <small>@lang('validation.attributes.active')</small>
                                    </label>
                                    <select name="active" id="active" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Domain\PageCategories\Models\PageCategory::statuses() as $active)
                                        <option value="{{$active}}" {{ (isset($filters['active']) && $filters['active'] == $active) ? 'selected': ''}}>
                                            @lang('admin.bool_statuses.'.$active)
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">
                                        <small>@lang('validation.attributes.title')</small>
                                    </label>
                                    <input class="form-control input-sm" name="title" id="title" type="text"  value="{{ $filters['title'] ?? '' }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="float-riht">
                                    <a href="{{ route('admin.page-categories.index') }}" class="btn btn-sm btn-danger">@lang('admin.filters_reset')</a>
                                    <button class="btn btn-sm btn-success">@lang('admin.filters_apply')</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            @endcomponent
		<a href="{{ route('admin.page-categories.create') }}" class="btn btn-sm btn-primary ml-2">
			<span class="d-none d-sm-inline-block">@lang('admin.create')</span> <i class="icmn-plus"></i>
		</a>
	    @endslot
		@if($pageCategories->isNotEmpty())
			<div class="table-responsive">
                <table class="table color-table primary-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('admin.order')</th>
                            <th>@lang('admin.top')</th>
                            <th>@lang('admin.bottom')</th>
                            <th>@lang('admin.active')</th>
                            <th class="text-nowrap">@lang('admin.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($pageCategories as $item)
                    		<tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.page-categories.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>{{ $item->order }}</td>
                                <td>
                                	@if($item->top)
                                		<span class="label label-success">Да</span>
                            		@else
                            			<span class="label label-danger">Нет</span>
                        			@endif
                                </td>
                                <td>
                                	@if($item->bottom)
                                		<span class="label label-success">Да</span>
                            		@else
                            			<span class="label label-danger">Нет</span>
                        			@endif
                                </td>
                                <td>
                                	@if($item->active)
                                		<span class="label label-success">@lang('admin.active')</span>
                            		@else
                            			<span class="label label-danger">@lang('admin.not_active')</span>
                        			@endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.page-categories.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    {{-- <a href="#" data-toggle="tooltip" data-original-title="@lang('admin.delete')"> <i class="fa fa-close text-danger"></i> </a> --}}
                                    <form action="{{ route('admin.page-categories.destroy', $item) }}" class="dib" method="post">
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
    		@include('common.pagination', ['data' => $pageCategories])
		@endslot

	@endcomponent
</div>
@endsection
