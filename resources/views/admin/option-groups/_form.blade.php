<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('type', 'has-error')!!}">
        <label class="col-form-label {!! $errors->first('type', 'control-label')!!}" for="order">@lang('admin.type')</label>
        <input type="text" name="type" class="form-control" id="type" value="{{ old('type', $optionGroup->type ?? '') }}"  >
        {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-error')!!}">
        <label class="col-form-label-sm {!! $errors->first('active', 'control-label')!!}" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $optionGroup->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $optionGroup->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {!! $errors->first('active', '<span class="help-block">:message</span>') !!}
    </div>

</div>

@component('component.translations', ['form' => 'admin.option-groups._translations_form', 'model' => $optionGroup?? null])@endcomponent

{{--@component('component.tiny-mc')@endcomponent--}}
@component('component.bootstrap-tagsinput')@endcomponent

{{-- @component('component.icheck')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


