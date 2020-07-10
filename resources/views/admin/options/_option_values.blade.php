<br>
<div class="option-values">
<?php
foreach($option->optionValues as $optValue) { ?>
<button type="button" class="btn btn-secondary valueBtn" id="ov_{{$optValue->id}}" data-option_value_id="{{$optValue->id}}" data-toggle="modal" data-target="#option_value" >
    {{ $optValue->name }}
</button>
<?php } ?>
</div>
<br>
<button type="button" class="btn btn-primary addValueBtn" id="addValueBtn" data-option_id="{{$option->id}}" data-toggle="modal" data-target="#option_value" >
    Add
</button>
@component('component.modal_options')@endcomponent
