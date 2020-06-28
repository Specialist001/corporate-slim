<?php $value_title = old('translations.'.$lang.'.title', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->title: '') ?>
<?php $value_short = old('translations.'.$lang.'.short', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->short: '') ?>
<div class="row">
    <div class="col-md-5 form-group {!! $errors->first('translations.'.$lang.'.title', 'has-error')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-title">@lang('admin.title')</label>
        <input type="text" name="translations[{{ $lang }}][title]" class="form-control input-sm" id="{{$lang}}-title" value="{{ $value_title }}" {{ ($lang == LaravelLocalization::getDefaultLocale())? 'required autofocus': '' }} >
        {!! $errors->first('translations.'.$lang.'.title', '<span class="help-block text-danger">:message</span>') !!}
    </div>
    <div class="col-md-7 form-group {!! $errors->first('translations.'.$lang.'.short', 'has-error')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-short">@lang('admin.short')</label>
        <input type="text" name="translations[{{ $lang }}][short]" class="form-control input-sm" id="{{$lang}}-short" value="{{ $value_short }}">
        {!! $errors->first('translations.'.$lang.'.short', '<span class="help-block text-danger">:message</span>') !!}
    </div>
</div>

