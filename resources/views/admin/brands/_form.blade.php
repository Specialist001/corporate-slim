<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('name', 'has-danger')!!}">
        <label class="col-form-label-sm" for="name">@lang('admin.title')</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $brand->name ?? '') }}"  >
        {!! $errors->first('name', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $brand->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $brand->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $brand->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {{--  <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" />  --}}
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group">
        <div class="w-100"><p><label>Отображать</label></p></div>
        <div class="row">
            <div class="col-md-8 {!! $errors->first('on_main', 'has-danger')!!}">
                <label class="col-form-label-sm" for="on_main">
                    @lang('admin.on_main')
                </label>
                <input type="checkbox" name="on_main" value="1" class="custom-control-input check" id="on_main" data-checkbox="icheckbox_square-green" {{ (old('on_main', $brand->on_main ?? 0) == 1) ? 'checked': ''}}>
                <div class="">
                    {!! $errors->first('on_main', '<small class="form-control-feedback">:message</small>') !!}
                </div>
            </div>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6 form-group {!! $errors->first('logo', 'has-danger')!!}">
        <label class="" for="image">@lang('admin.logo')</label>
        @if(isset($brand) && $brand->logo)
            <p id="thumb">
                <img src="{{$brand->logoUrl()}}" alt="{{$brand->logo}}" class="img-thumbnail d-block">
                <small id="delete_logo" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="logo" class="form-control" id="logo" >
        {!! $errors->first('logo', '<small class="form-control-feedback">:message</small>') !!}
    </div>
</div>
@component('component.icheck')@endcomponent
