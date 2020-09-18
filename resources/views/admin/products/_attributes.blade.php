<?php
if ($product) {
    $productOptionValues = array_column($product->optionValues->toArray(), 'id');
}
//dd($productOptionValues);
//dd($options);
?>
<ul>
@foreach($options as $option)
    <li>
    <label for="option_{{$option->id}}">{{$option->name}}</label>
    <select name="option[{{$option->id}}]" id="option_{{$option->id}}">
        @foreach($option->optionValues as $optionValue)
            <option id="optionValue_{{$optionValue->id}}" value="{{$optionValue->id}}"
            {{in_array($optionValue->id, $productOptionValues) ? 'selected' : ''}}>{{$optionValue->name}}</option>
        @endforeach
    </select>
{{--        <button type="button" class="btn btn-secondary valueBtn" id="ov_" data-option_value_id="" data-toggle="modal" data-target="#option_value" >--}}
{{--            {{ $option->optionValue }}--}}
{{--        </button>--}}
    </li>
@endforeach
</ul>
@push('styles')
    <style type="text/css">
        ul li {
            display: inline;
            padding-right: 10px;
        }
    </style>
@endpush
