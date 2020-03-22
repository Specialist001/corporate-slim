<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('page_category_id', 'has-danger')!!}">
        <label class="col-form-label-sm" for="type">@lang('admin.category')</label>
        <select name="page_category_id" id="page_category_id" class="form-control" required>
            @foreach($pageCategories as $pageCategory)
                <option value="{{ $pageCategory->id }}" {{ (old('page_category_id', $page->page_category_id ?? '') == $pageCategory->id) ? 'selected': ''}}>{{$pageCategory->name}}</option>
            @endforeach
        </select>
        {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-2 form-group {!! $errors->first('type', 'has-danger')!!}">
        <label class="col-form-label-sm" for="type">@lang('admin.type')</label>
        <select name="type" id="type" class="form-control" required>
            @foreach(\App\Domain\Pages\Models\Page::types() as $type)
                <option value="{{ $type }}" {{ (old('type', $page->type ?? '') == $type) ? 'selected': ''}}>{{$type}}</option>
            @endforeach
        </select>
        {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-2 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $page->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $page->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $page->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {{--  <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" />  --}}
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-4 form-group">
        <div class="w-100"><p><label>Настройки</label></p></div>
        <div class="row">
            <div class="col-md-5 {!! $errors->first('top', 'has-danger')!!}">
                <label class="col-form-label-sm" for="top">
                    @lang('admin.top')
                </label>
                <input type="checkbox"  name="top" value="1" class="custom-control-input check" id="top" data-checkbox="icheckbox_square-green" {{ (old('top', $page->top ?? 0) == 1) ? 'checked': ''}}>
                <div class="">
                    {!! $errors->first('top', '<small class="form-control-feedback">:message</small>') !!}
                </div>
            </div>
            <div class="col-md-5 {!! $errors->first('system', 'has-danger')!!}">
                <label class="col-form-label-sm" for="system">
                    @lang('admin.system')
                </label>
                <input type="checkbox"  name="system" value="1" class="custom-control-input check" id="system" data-checkbox="icheckbox_square-green" {{ (old('system', $page->system ?? 0) == 1) ? 'checked': ''}}>
                <div class="">
                    {!! $errors->first('system', '<small class="form-control-feedback">:message</small>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@component('component.translations', ['form' => 'admin.pages._translations_form', 'model' => $page?? null])@endcomponent

<div class="row">
    <div class="col-md-6 form-group {!! $errors->first('image', 'has-danger')!!}">
        <label class="" for="image">@lang('admin.image')</label>
        @if(isset($page) && $page->image)
            <p id="thumb">
                <img src="{{$page->thumbUrl()}}" alt="{{$page->image}}" class="img-thumbnail d-block">
                <small id="delete_image" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="image" class="form-control" id="image" >
        {!! $errors->first('image', '<small class="form-control-feedback">:message</small>') !!}
    </div>
</div>

@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent
@component('component.icheck')@endcomponent
{{--  @component('component.switchery')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


