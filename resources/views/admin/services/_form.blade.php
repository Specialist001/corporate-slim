<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('service_category_id', 'has-danger')!!}">
        <label class="col-form-label-sm" for="service_category_id">@lang('admin.category')</label>
        <select name="service_category_id" id="service_category_id" class="form-control" required>
            <option value="" disabled selected>Select one</option>
            @include('admin.services._categories', ['categories'=>$categories])
        </select>
        {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $serviceCategory->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $serviceCategory->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $serviceCategory->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>


    {{-- <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <div>
            <input type="checkbox" class="js-switch" name="active" id="active" data-color="#99d683" data-secondary-color="#f96262"
            {{ (old('active', $serviceCategory->active ?? 1) == 1) ? 'checked' : '' }} />
        </div>
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div> --}}

</div>

@component('component.translations', ['form' => 'admin.services._translations_form', 'model' => $service?? null])@endcomponent

<div class="row">
    <div class="col-md-6 form-group {!! $errors->first('image', 'has-danger')!!}">
        <label class="" for="image">@lang('admin.image')</label>
        @if(isset($service) && $service->image)
            <p id="thumb">
                <img src="{{$service->thumbUrl()}}" alt="{{$service->image}}" class="img-thumbnail d-block">
                <small id="delete_image" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="image" class="form-control" id="image" >
        {!! $errors->first('image', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-2 form-group {!! $errors->first('icon', 'has-danger')!!}">
        <label class="" for="icon">@lang('admin.icon')</label>
        @if(isset($service) && $service->icon)
            <p id="thumb">
                <img src="{{$service->thumbUrl()}}" alt="{{$service->icon}}" class="img-thumbnail d-block">
                <small id="delete_icon" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="icon" class="form-control" id="icon" >
        {!! $errors->first('icon', '<small class="form-control-feedback">:message</small>') !!}
    </div>
</div>

@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent

{{-- @component('component.icheck')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


