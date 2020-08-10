<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $unit->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $unit->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {{--  <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" />  --}}
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>

</div>

@component('component.translations', ['form' => 'admin.units._translations_form', 'model' => $unit ?? null])@endcomponent

{{--  @component('component.switchery')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


