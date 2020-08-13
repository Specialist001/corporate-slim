@extends('admin.layout')

@section('center_content')
<div class="col-md-12">
	@component('component.white-box', ['title' => trans('common.titles.products')])
		@slot('buttons')
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
