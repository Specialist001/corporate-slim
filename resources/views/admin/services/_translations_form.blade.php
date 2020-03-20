<?php $value_title = old('translations.'.$lang.'.title', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->title: '') ?>
<?php $value_short = old('translations.'.$lang.'.short', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->short: '') ?>
<div class="row">
    <div class="col-md-5 form-group {!! $errors->first('translations.'.$lang.'.title', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-title">@lang('admin.title')</label>
        <input type="text" name="translations[{{ $lang }}][title]" class="form-control input-sm" id="{{$lang}}-title" value="{{ $value_title }}" {{ ($lang == LaravelLocalization::getDefaultLocale())? 'required autofocus': '' }} >
        {!! $errors->first('translations.'.$lang.'.title', '<small class="help-block text-danger">:message</small>') !!}
    </div>
    <div class="col-md-7 form-group {!! $errors->first('translations.'.$lang.'.short', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-short">@lang('admin.short')</label>
        <input type="text" name="translations[{{ $lang }}][short]" class="form-control input-sm" id="{{$lang}}-short" value="{{ $value_short }}">
        {!! $errors->first('translations.'.$lang.'.short', '<small class="help-block text-danger">:message</small>') !!}
    </div>
</div>

<?php $value_description = old('translations.'.$lang.'.description', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->description: '') ?>
<div class="row">
    <div class="col-md-12 form-group {!! $errors->first('translations.'.$lang.'.description', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-description">@lang('admin.description')</label>
        <textarea name="translations[{{ $lang }}][description]" class="form-control text-editor " id="{{$lang}}-description">{{ $value_description }}</textarea>
        {!! $errors->first('translations.'.$lang.'.description', '<small class="help-block text-danger">:message</small>') !!}
    </div>
</div>

<br>

<?php $value_meta_title = old('translations.'.$lang.'.meta_title', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->meta_title: '') ?>
<?php $value_meta_keywords = old('translations.'.$lang.'.meta_keywords', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->meta_keywords: '') ?>
<h3>SEO</h3>
<div class="row">
    <div class="col-md-5 form-group {!! $errors->first('translations.'.$lang.'.meta_title', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-meta_title">@lang('admin.seo.meta_title')</label>
        <input type="text" name="translations[{{ $lang }}][meta_title]" class="form-control input-sm" id="{{$lang}}-meta_title" value="{{ $value_meta_title }}">
        {!! $errors->first('translations.'.$lang.'.meta_title', '<small class="help-block text-danger">:message</small>') !!}
    </div>
    <div class="col-md-7 form-group {!! $errors->first('translations.'.$lang.'.meta_keywords', 'has-danger')!!}">
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-meta_keywords">@lang('admin.seo.meta_keywords')</label>
        <div class="db">
            <input data-role="tagsinput"  type="text" name="translations[{{ $lang }}][meta_keywords]" class="form-control input-sm" id="{{$lang}}-meta_keywords" value="{{ $value_meta_keywords }}">
            {!! $errors->first('translations.'.$lang.'.meta_keywords', '<small class="help-block text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<?php $value_meta_description = old('translations.'.$lang.'.meta_description', (isset($model) && $model->translate($lang)) ? $model->translate($lang)->meta_description: '') ?>
<div class="row">
    <div class="col-md-12 form-group {!! $errors->first('translations.'.$lang.'.meta_description', 'has-danger')!!}"
        <label class="text-md-right col-form-label-sm" for="{{$lang}}-meta_description">@lang('admin.seo.meta_description')</label>
        <textarea name="translations[{{ $lang }}][meta_description]" class="form-control" id="{{$lang}}-meta_description" >{{ $value_meta_description }}</textarea>
        {!! $errors->first('translations.'.$lang.'.meta_description', '<small class="help-block text-danger">:message</small>') !!}
    </div>
</div>
