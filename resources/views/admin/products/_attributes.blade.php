<?php
$productOptionValues = array_column($product->optionValues->toArray(), 'id');
//dd($productOptionValues);
dd($options);
?>
@foreach($options as $option)
    <div>
    <label>{{$option->name}}</label>
    <select name="option[{{$option->id}}]">
        @foreach($option->optionValues as $optionValue)
            <option id="optionValue_{{$optionValue->id}}"
            {{in_array($optionValue->id, $productOptionValues) ? 'selected' : ''}}>{{$optionValue->name}}</option>
        @endforeach
    </select>
        <button type="button" class="btn btn-secondary valueBtn" id="ov_" data-option_value_id="" data-toggle="modal" data-target="#option_value" >
            {{ $option->optionValue }}
        </button>
    </div>
@endforeach
