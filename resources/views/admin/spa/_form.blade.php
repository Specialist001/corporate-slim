<div class="row ">
    <div class="col-md-3 form-group {!! $errors->first('type', 'has-danger')!!}">
        <label class="col-form-label-sm" for="type">@lang('admin.type')</label>
        <select name="type" id="type" class="form-control" required>
            @foreach(\App\Domain\News\Models\News::types() as $type)
                <option value="{{ $type }}" {{ (old('type', $news->type ?? '') == $type) ? 'selected': ''}}>{{$type}}</option>
            @endforeach
        </select>
        {!! $errors->first('type', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('order', 'has-danger')!!}">
        <label class="col-form-label" for="order">@lang('admin.order')</label>
        <input type="number" step="1" min="0" name="order" class="form-control" id="order" value="{{ old('order', $news->order ?? 0) }}"  >
        {!! $errors->first('order', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    <div class="col-md-3 form-group {!! $errors->first('active', 'has-danger')!!}">
        <label class="col-form-label-sm" for="active">@lang('admin.status')</label>
        <select name="active" id="active" class="form-control" required>
            <option type="checkbox" class="js-switch" value="1" {{ (old('active', $news->active ?? 1) == 1) ? 'selected': ''}}>@lang('admin.active')</option>
            <option type="checkbox" class="js-switch" value="0" {{ (old('active', $news->active ?? 1) == 0) ? 'selected': ''}}>@lang('admin.not_active')</option>
        </select>
        {{--  <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" />  --}}
        {!! $errors->first('active', '<small class="form-control-feedback">:message</small>') !!}
    </div>
    
</div>

@component('component.translations', ['form' => 'admin.news._translations_form', 'model' => $news?? null])@endcomponent

<div class="row">
    <div class="col-md-6 form-group {!! $errors->first('image', 'has-danger')!!}">
        <label class="" for="image">@lang('admin.image')</label>
        @if(isset($news) && $news->image)
            <p id="thumb">
                <img src="{{$news->thumbUrl()}}" alt="{{$news->image}}" class="img-thumbnail d-block">
                <small id="delete_image" class="text-danger cur-pointer"><i class="icmn-cross"></i> @lang('admin.destroy')</small>
            </p>
        @endif
        <input type="file" name="image" class="form-control" id="image" >
        {!! $errors->first('image', '<small class="form-control-feedback">:message</small>') !!}
    </div>
</div>

@component('component.tiny-mc')@endcomponent
@component('component.bootstrap-tagsinput')@endcomponent
{{--  @component('component.switchery')@endcomponent  --}}
{{--  @component('component.select2')@endcomponent  --}}


