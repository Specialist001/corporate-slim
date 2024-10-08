<?php $all_locales = LaravelLocalization::getSupportedLanguagesKeys(); ?>
<?php $default = LaravelLocalization::getDefaultLocale(); ?>
@if(count($all_locales) > 1)
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#{{$default}}{{$label ?? ''}}" aria-controls="{{$default}}{{$label ?? ''}}" role="tab" data-toggle="tab" aria-expanded="false">
                @lang('admin.locales.'.$default)
            </a>
        </li>
        @foreach($all_locales as $locale)
            @if($locale != $default)
                <li role="presentation" class="">
                    <a href="#{{$locale}}{{$label??''}}" aria-controls="{{$locale}}{{$label??''}}" role="tab" data-toggle="tab" aria-expanded="true">
                        @lang('admin.locales.'.$locale)
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
@isset($formContent)
    <form id="{{$formContent['id']}}">
        <input type="hidden" name="{{$formContent['option_id']}}" value="{{$formContent['option_id_value']}}">
        <input type="hidden" name="{{$formContent['value_id']}}" value="{{$model->id ?? ''}}">
@endisset
<div class="tab-content">
    <div class="tab-pane active" id="{{$default}}{{$label??''}}" role="tabpanel">
        @include($form, ['lang' => $default, 'model' => $model])
        <input type="hidden" name="translations[{{ $default }}][locale]" value="{{ $default }}">
    </div>
    @foreach($all_locales as $locale)
        @if($locale != $default)
            <div class="tab-pane" id="{{$locale}}{{$label??''}}" role="tabpanel">
                @include($form, ['lang' => $locale, 'model' => $model])
                <input type="hidden" name="translations[{{ $locale }}][locale]" value="{{ $locale }}">
            </div>
        @endif
    @endforeach
</div>
@isset($formContent)
    <a class="btn btn-success" id="{{$model->id ? 'saveValue' : 'addValue'}}">Save</a>
    @isset($isOld)
        <a class="btn btn-danger" id="deleteValue" data-option_value_id="{{$model->id}}">Delete</a>
    @endisset
    </form>

@endisset
