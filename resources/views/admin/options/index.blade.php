@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('common.titles.options')])
		@slot('buttons')
            @component('component.modal', ['id' => 'filter', 'class' => 'btn btn-sm btn-secondary ml-2'])
                @slot('label')
                    <i class="ti-filter"></i>
                @endslot
                @slot('title')
                    @lang('admin.filters')
                @endslot

                <div id="filters">
                    <form action="{{ route('admin.options.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id">
                                        <small>@lang('validation.attributes.id')</small>
                                    </label>
                                    <input class="form-control input-sm" name="id" id="id" type="number" step="1" min="1" value="{{ $filters['id'] ?? '' }}"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">
                                        <small>@lang('validation.attributes.type')</small>
                                    </label>
                                    <select name="type" id="type" class="form-control input-sm">
                                        <option value=""></option>
                                        @foreach($optionTypes as $type)
                                        <option value="{{$type}}" {{ (isset($filters['type']) && $filters['type'] == $type) ? 'selected': ''}}>
                                            @lang('admin.option_types.'.$type)
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="option_group_id">
                                        <small>@lang('validation.attributes.option_group')</small>
                                    </label>
                                    <select name="option_group_id" id="option_group_id" class="form-control input-sm">
                                        <option value=""></option>
                                        @foreach($optionGroups as $optionGroup)
                                        <option value="{{$optionGroup->id}}" {{ (isset($filters['option_group_id']) && $filters['option_group_id'] == $optionGroup->id) ? 'selected': ''}}>
                                            {{$optionGroup->title}}
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
                                    <input class="form-control input-sm" name="name" id="name" type="text"  value="{{ $filters['name'] ?? '' }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="float-riht">
                                    <a href="{{ route('admin.options.index') }}" class="btn btn-sm btn-danger">@lang('admin.filters_reset')</a>
                                    <button class="btn btn-sm btn-success">@lang('admin.filters_apply')</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            @endcomponent
		<a href="{{ route('admin.options.create') }}" class="btn btn-sm btn-primary ml-2">
			<span class="d-none d-sm-inline-block">@lang('admin.create')</span> <i class="icmn-plus"></i>
		</a>
	    @endslot
		@if($options->isNotEmpty())
			<div class="table-responsive">
                <table class="table color-table primary-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('common.titles.option_group')</th>
                            <th>@lang('admin.type')</th>
                            <th class="text-nowrap">@lang('admin.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($options as $item)
                    		<tr>
                                <td>{{ $item->id }}</td>

                                <td>
                                    <a href="{{ route('admin.options.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td>{{ $item->optionGroup->title }}</td>
                                <td>@lang('admin.option_types.'.$item->type)</td>

                                <td class="text-nowrap">
                                    <a href="{{ route('admin.options.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    {{-- <a href="#" data-toggle="tooltip" data-original-title="@lang('admin.delete')"> <i class="fa fa-close text-danger"></i> </a> --}}
                                    <form action="{{ route('admin.options.destroy', $item) }}" class="dib" method="post">
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
    		@include('common.pagination', ['data' => $options])
		@endslot

	@endcomponent
</div>
@endsection
