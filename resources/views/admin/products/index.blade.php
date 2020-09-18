@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('common.titles.products')])
		@slot('buttons')
            @component('component.modal', ['id' => 'filter', 'class' => 'btn btn-sm btn-secondary ml-2'])
                @slot('label')
                    <i class="ti-filter"></i>
                @endslot
                @slot('title')
                    @lang('admin.filters')
                @endslot
<?php //dd($filters); ?>
                <div id="filters">
                    <form action="{{ route('admin.products.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id">
                                        <small>@lang('validation.attributes.id')</small>
                                    </label>
                                    <input class="form-control" name="id" id="id" type="number" step="1" min="1" value="{{ $filters['id'] ?? '' }}"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="product_category_id">
                                        <small>@lang('admin.category')</small>
                                    </label>
                                    <select name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="">Все</option>
                                        @foreach(\App\Domain\ProductCategories\Models\ProductCategory::all()->toArray() as $category)
                                            <option value="{{$category['id']}}" {{ (isset($filters['product_category_id']) && $filters['product_category_id'] == $category['id']) ? 'selected': ''}}>
                                                {{$category['title']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="brand_id">
                                        <small>@lang('shop.product.brand')</small>
                                    </label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="">Все</option>
                                        @foreach(\App\Domain\Brands\Models\Brand::all()->toArray() as $brand)
<!--                                            --><?php //print_r($category) ?>
                                            <option value="{{$brand['id']}}" {{ (isset($filters['brand_id']) && $filters['brand_id'] == $brand['id']) ? 'selected': ''}}>
{{--                                                @lang('admin.bool_statuses.'.$active)--}}
                                                {{$brand['name']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="active">
                                        <small>@lang('validation.attributes.active')</small>
                                    </label>
                                    <select name="active" id="active" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Domain\Products\Models\Product::statuses() as $active)
                                            <option value="{{$active}}" {{ (isset($filters['active']) && $filters['active'] == $active) ? 'selected': ''}}>
                                                @lang('admin.bool_statuses.'.$active)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">
                                        <small>@lang('validation.attributes.title')</small>
                                    </label>
                                    <input class="form-control input-sm" name="title" id="title" type="text"  value="{{ $filters['title'] ?? '' }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="float-riht">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-danger">@lang('admin.filters_reset')</a>
                                    <button class="btn btn-sm btn-success">@lang('admin.filters_apply')</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            @endcomponent
		<a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary ml-2">
			<span class="d-none d-sm-inline-block">@lang('admin.create')</span> <i class="icmn-plus"></i>
		</a>
	    @endslot
		@if($products->isNotEmpty())
			<div class="table-responsive">
                <table class="table color-table primary-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('admin.title')</th>
                            <th>@lang('shop.product.product_category')</th>
                            <th>@lang('shop.product.brand')</th>
{{--                            <th>@lang('admin.thumb')</th>--}}
                            <th>@lang('shop.product.amount')</th>
                            <th>@lang('shop.product.price')</th>
                            <th>@lang('shop.product.sku')</th>
                            <th>@lang('admin.active')</th>
                            <th class="text-nowrap">@lang('admin.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($products as $item)
                    		<tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td>{{ $item->category->title }}</td>
                                <td>{{ $item->brand->name }}</td>
{{--                                <td>--}}
{{--                                    <img src="{{ $item->thumbUrl() }}" class="img-thumbnail" style="width:100px">--}}
{{--                                </td>--}}
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>
                                	@if($item->active)
                                		<span class="label label-success">Active</span>
                            		@else
                            			<span class="label label-danger">Not active</span>
                        			@endif
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.products.edit', $item) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('admin.edit')"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    {{-- <a href="#" data-toggle="tooltip" data-original-title="@lang('admin.delete')"> <i class="fa fa-close text-danger"></i> </a> --}}
                                    <form action="{{ route('admin.products.destroy', $item) }}" class="dib" method="post">
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
    		@include('common.pagination', ['data' => $products])
		@endslot

	@endcomponent
</div>
@endsection
