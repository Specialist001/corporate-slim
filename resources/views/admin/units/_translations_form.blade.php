<?php $value_name = old('translations.'.$lang.'.name', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->name: '') ?>
<div class="row">
    <div class="col-md-4 form-group {!! $errors->first('translations.'.$lang.'.name', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-name">@lang('admin.title')</label>
        <input type="text" name="translations[{{ $lang }}][name]" class="form-control input-sm" id="{{$lang}}-name" value="{{ $value_name }}" {{ ($lang == LaravelLocalization::getDefaultLocale())? 'required autofocus': '' }} >
        {!! $errors->first('translations.'.$lang.'.name', '<small class="help-block text-danger">:message</small>') !!}
    </div>
</div>
