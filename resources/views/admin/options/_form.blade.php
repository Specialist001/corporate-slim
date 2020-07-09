<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('option_group_id', 'has-error')!!}">
        <label class="col-form-label {!! $errors->first('option_group_id', 'control-label')!!}" for="option_group_id">@lang('common.titles.option_groups')</label>
        <select name="option_group_id" id="option_group_id" class="form-control" required>
            @foreach($optionGroups as $optionGroup)
                <option value="{{ $optionGroup->id }}" {{ (old('option_group_id', $option->option_group_id ?? '') == $optionGroup->id) ? 'selected': ''}}>{{$optionGroup->title}}</option>
            @endforeach
        </select>
        {!! $errors->first('option_group_id', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('type', 'has-error')!!}">
        <label class="col-form-label {!! $errors->first('type', 'control-label')!!}" for="type">@lang('admin.type')</label>
        <select name="type" id="type" class="form-control" required>
            @foreach($optionTypes as $optionType)
                <option value="{{ $optionType }}" {{ (old('type', $option->type ?? '') == $optionType) ? 'selected': ''}}>@lang('admin.option_types.'.$optionType)</option>
            @endforeach
        </select>
        {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('order', 'has-error')!!}">
        <label class="col-form-label {!! $errors->first('order', 'control-label')!!}" for="order">@lang('admin.order')</label>
        <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $option->order ?? '') }}"  >
        {!! $errors->first('order', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<?php //foreach($option->optionValues as $optValue) { ?>
{{--@component('component.modal', ['id' => 'option_'.$optValue->id, 'class' => 'btn btn-sm btn-secondary ml-2'])--}}
{{--    @slot('label')--}}
{{--        {{$optValue->name}}--}}
{{--    @endslot--}}
{{--    @slot('title')--}}
{{--        {{$optValue->name}}--}}
{{--    @endslot--}}
{{--    @component('component.translations', ['form' => 'admin.options._option_value_translations_form', 'model' => $optValue ?? null, 'label' => $optValue->id  ])@endcomponent--}}
{{--@endcomponent--}}

<?php //} ?>

@component('component.translations', ['form' => 'admin.options._translations_form', 'model' => $option ?? null])@endcomponent




@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent

{{-- @component('component.icheck')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


