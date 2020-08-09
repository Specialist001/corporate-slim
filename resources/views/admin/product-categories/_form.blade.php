<?php
use App\Helpers\Yii\ArrayHelper;

//$cat_filter[] = 'Без родителя';
$cat_options = [];
$cats = $categories;
$model = $productCategory;
if (!empty($cats)) {
    foreach ($cats as $cat) {
        if ($model->id == $cat->id) continue;
        $cat_filters[$cat->id] = $cat->title;
        if ($cat->children) {
            $cat_filters = ArrayHelper::merge($cat_filters, getCategoryChild($cat->children, $model));
            $cat_options = ArrayHelper::merge($cat_options, getCategoryOptions($cat->children, $model));
        }
    }
}

function getCategoryChild($cat, $model, $index = 1)
{
    $result = [];
    $prefix = '';
    for ($i = 0; $i < $index; $i++) {
        $prefix .= '-';
    }
    $style = false;
    if ($index == 1) $style = 'bold';
    foreach ($cat as $item) {
        if ($model->id == $item->id) continue;
        if ($style) $result[$item->id] = $prefix . $item->title;
        else $result[$item->id] = $prefix . $item->title;
        if ($item->children) {
            $result = ArrayHelper::merge($result, getCategoryChild($item->children, $model, $index + 1));
        }
    }
    return $result;
}

function getCategoryOptions($cat, $model, $index = 1)
{
    $result = [];
    foreach ($cat as $item) {
        if ($model->id == $item->id) continue;
        $result[$item->id] =  ['style' => 'font-weight: bold;'];
    }
    return $result;
}

?>
<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('parent_id', 'has-danger')!!}">
        <label class="col-form-label-sm" for="parent_id">@lang('admin.parent_category')</label>
        <select name="parent_id" id="parent_id" class="form-control select2" required>
            <option value="0">Без родительской</option>
            @foreach($cat_filters as $key => $cat_filter)
                <option value="{!!  $key !!}"
                @isset($productCategory->id)
                    @if($productCategory->parent_id == $key)
                    selected=""
                    @endif
                @endisset
                >
                    {!! $cat_filter !!}
                </option>
            @endforeach
{{--            @include('admin.product-categories._categories', ['categories'=>$categories, 'productCategory' => $productCategory])--}}
        </select>
        {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $productCategory->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $productCategory->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $productCategory->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 {!! $errors->first('on_main', 'has-danger')!!}">
        <label class="col-form-label-sm" for="on_main">
            @lang('admin.on_main')
        </label>
        <br>
        <input type="checkbox"  name="on_main" value="1" class="custom-control-input check" id="on_main" data-checkbox="icheckbox_square-green" {{ (old('on_main', $productCategory->on_main ?? 0) == 1) ? 'checked': ''}}>
        <div class="">
            {!! $errors->first('on_main', '<small class="form-control-feedback">:message</small>') !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-8">
        @component('component.translations', ['form' => 'admin.product-categories._translations_form', 'model' => $productCategory?? null])@endcomponent
    </div>
    <div class="col-md-4">
        @isset($optionGroups)
            <label class="col-form-label-sm" for="option_groups">@lang('common.titles.option_groups')</label>
            <select name="option_group_id[]" id="option_groups" class="form-control select2" multiple="multiple">
            @foreach($optionGroups as $optionGroup)
                <option value="{{$optionGroup->id}}" @if(in_array($optionGroup->id, $productCategory->optionGroupsArray())) selected @endif>{{$optionGroup->title}}</option>
            @endforeach
            </select>
        @endisset
    </div>
</div>
<div class="row">
    <div class="col-md-6 form-group {!! $errors->first('image', 'has-danger')!!}">
        <label class="" for="image">@lang('admin.image')</label>
        @if(isset($productCategory) && $productCategory->image)
            <p id="thumb">
                <img src="{{$productCategory->thumbUrl()}}" alt="{{$productCategory->image}}" class="img-thumbnail d-block">
                <small id="delete_image" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="image" class="form-control" id="image" >
        {!! $errors->first('image', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-4 form-group {!! $errors->first('icon', 'has-danger')!!}">
        <label class="" for="icon">@lang('admin.icon')</label>
        @if(isset($productCategory) && $productCategory->icon)
            <p id="icon" style="width: 30%">
                <img src="{{$productCategory->iconUrl()}}" alt="{{$productCategory->icon}}" class="img-thumbnail d-block">
                <small id="delete_icon" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="icon" class="form-control" id="icon" >
        {!! $errors->first('icon', '<small class="form-control-feedback">:message</small>') !!}
    </div>
</div>

@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent
@component('component.icheck')@endcomponent
@component('component.select2')@endcomponent


