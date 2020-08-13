<div class="col-12">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#product_tab" aria-controls="product_tab" role="tab" data-toggle="tab" aria-expanded="false">
                @lang('common.titles.product')
            </a>
        </li>
        <li role="presentation" class="">
            <a href="#product_images_tab" aria-controls="product_images_tab" role="tab" data-toggle="tab" aria-expanded="true">
                @lang('shop.product.images')
            </a>
        </li>
        <li role="presentation" class="">
            <a href="#product_attributes_tab" aria-controls="product_attributes_tab" role="tab" data-toggle="tab" aria-expanded="true">
                @lang('shop.product.attributes')
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="product_tab" role="tabpanel">
            <div class="row">
                <div class="col-md-3 form-group {!! $errors->first('product_category_id', 'has-danger')!!}">
                    <label class="col-form-label-sm" for="product_category_id">@lang('shop.product.product_category')</label>
                    <select name="product_category_id" id="product_category_id" class="form-control" required>
                        @foreach($productCategories as $productCategory)
                            <option value="{{ $productCategory->id }}" {{ (old('product_category_id', $product->product_category_id ?? '') == $productCategory->id) ? 'selected': ''}}>{{$productCategory->title}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
                </div>
                <div class="col-md-3 form-group {!! $errors->first('brand_id', 'has-danger')!!}">
                    <label class="col-form-label-sm" for="brand_id">@lang('shop.product.brand')</label>
                    <select name="brand_id" id="brand_id" class="form-control" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ (old('brand_id', $product->brand_id ?? '') == $brand->id) ? 'selected': ''}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
                </div>
                <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
                    <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
                    <select name="active" id="active" class="form-control" required>
                        <option type="checkbox" class="js-switch" value="1" {{ (old('active', $product->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
                        <option type="checkbox" class="js-switch" value="0" {{ (old('active', $product->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
                    </select>
                    {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
                </div>
                <div class="col-md-3 form-group">
                    <div class="w-100"><p><label>Отображать</label></p></div>
                    <div class="row">
                        <div class="col-md-8 {!! $errors->first('on_main', 'has-danger')!!}">
                            <label class="col-form-label-sm" for="on_main">
                                @lang('admin.on_main')
                            </label>
                            <input type="checkbox" name="on_main" value="1" class="custom-control-input check" id="on_main" data-checkbox="icheckbox_square-green" {{ (old('on_main', $product->on_main ?? 0) == 1) ? 'checked': ''}}>
                            <div class="">
                                {!! $errors->first('on_main', '<small class="form-control-feedback">:message</small>') !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('component.translations', ['form' => 'admin.news._translations_form', 'model' => $product ?? null])@endcomponent
                </div>
                <div class="col-md-6">
                    <br/>
                    <div class="row">
                        <div class="col-md-3 form-group {!! $errors->first('price', 'has-danger')!!}">
                            <label class="" for="price">@lang('shop.product.price')</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $product->price ?? '') }}" placeholder="@lang('shop.product.uzs')">
                            {!! $errors->first('price', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                        <div class="col-md-3 form-group {!! $errors->first('old_price', 'has-danger')!!}">
                            <label class="" for="old_price">@lang('shop.product.old_price')</label>
                            <input type="number" name="old_price" class="form-control" id="old_price" value="{{ old('old_price', $product->old_price ?? '') }}" placeholder="@lang('shop.product.uzs')">
                            {!! $errors->first('old_price', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                        <div class="col-md-3 form-group {!! $errors->first('amount', 'has-danger')!!}">
                            <label class="" for="amount">@lang('shop.product.amount')</label>
                            <input type="number" name="amount" class="form-control" id="amount" value="{{ old('amount', $product->amount ?? '') }}">
                            {!! $errors->first('amount', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                        <div class="col-md-3 form-group {!! $errors->first('unit_id', 'has-danger')!!}">
                            <label class="" for="unit_id">@lang('shop.product.unit')</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}" {{ (old('unit_id', $product->unit_id ?? '') == $brand->id) ? 'selected': ''}}>{{$unit->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('unit_id', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group {!! $errors->first('warranty', 'has-danger')!!}">
                            <label class="" for="warranty">@lang('shop.product.warranty')</label>
                            <input type="number" name="warranty" class="form-control" id="warranty" value="{{ old('warranty', $product->warranty ?? '') }}" placeholder="@lang('shop.product.month')">
                            {!! $errors->first('warranty', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                        <div class="col-md-4 form-group {!! $errors->first('sku', 'has-danger')!!}">
                            <label class="" for="sku">@lang('shop.product.sku')</label>
                            <input type="text" name="sku" class="form-control" id="sku" value="{{ old('sku', $product->sku ?? '') }}" placeholder="@lang('shop.product.sku')">
                            {!! $errors->first('sku', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                        <div class="col-md-5 form-group {!! $errors->first('manufacturer', 'has-danger')!!}">
                            <label class="" for="manufacturer">@lang('shop.product.manufacturer')</label>
                            <input type="text" name="manufacturer" class="form-control" id="manufacturer" value="{{ old('manufacturer', $product->manufacturer ?? '') }}" placeholder="@lang('shop.product.manufacturer')">
                            {!! $errors->first('manufacturer', '<small class="form-control-feedback">:message</small>') !!}
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <div class="tab-pane" id="product_images_tab" role="tabpanel">
            <div class="row">
{{--                <div class="col-md-6 form-group {!! $errors->first('image', 'has-danger')!!}">--}}
{{--                    <label class="" for="image">@lang('admin.image')</label>--}}
{{--                    @if(isset($news) && $news->image)--}}
{{--                        <p id="thumb">--}}
{{--                            <img src="{{$news->thumbUrl()}}" alt="{{$news->image}}" class="img-thumbnail d-block">--}}
{{--                            <small id="delete_image" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>--}}
{{--                        </p>--}}
{{--                    @endif--}}
{{--                    <input type="file" name="image" class="form-control" id="image" >--}}
{{--                    {!! $errors->first('image', '<small class="form-control-feedback">:message</small>') !!}--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="tab-pane" id="product_attributes_tab" role="tabpanel">
            @component('admin.products._attributes', ['options' => $product->options ?? null])
            @endcomponent
        </div>

    </div>
</div>


@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent
@component('component.icheck')@endcomponent
{{--  @component('component.switchery')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


