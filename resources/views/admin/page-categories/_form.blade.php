<div class="row ">
    <div class="col-md-2 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $pageCategory->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $pageCategory->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $pageCategory->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-4 form-group">
        <div class="w-100"><p><label>Отображать</label></p></div>
        <div class="row">
            <div class="col-md-5 {!! $errors->first('top', 'has-danger')!!}">
                <label class="col-form-label-sm" for="top">
                    @lang('admin.top')
                </label>
                <input type="checkbox"  name="top" value="1" class="custom-control-input check" id="top" data-checkbox="icheckbox_square-green" {{ (old('top', $pageCategory->top ?? 0) == 1) ? 'checked': ''}}>
                <div class="">
                    {!! $errors->first('top', '<small class="form-control-feedback">:message</small>') !!}
                </div>
            </div>
            <div class="col-md-5 {!! $errors->first('bottom', 'has-danger')!!}">
                <label class="col-form-label-sm" for="bottom">
                    @lang('admin.bottom')
                </label>
                <input type="checkbox"  name="bottom" value="1" class="custom-control-input check" id="bottom" data-checkbox="icheckbox_square-green" {{ (old('bottom', $pageCategory->bottom ?? 0) == 1) ? 'checked': ''}}>
                <div class="">
                    {!! $errors->first('bottom', '<small class="form-control-feedback">:message</small>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@component('component.translations', ['form' => 'admin.page-categories._translations_form', 'model' => $pageCategory?? null])@endcomponent

{{--@component('component.tiny-mc')@endcomponent--}}
{{--@component('component.bootstrap-tagsinput')@endcomponent--}}

 @component('component.icheck')@endcomponent
{{--  @component('component.select2')@endcomponent  --}}


