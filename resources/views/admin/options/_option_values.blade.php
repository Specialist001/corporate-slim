<br>
<?php
foreach($option->optionValues as $optValue) { ?>
<button type="button" class="btn btn-secondary valueBtn" data-option_value_id="{{$optValue->id}}" data-toggle="modal" data-target="#option_value" >
    {{ $optValue->name }}
</button>
<?php } ?>

@component('component.modal_options')@endcomponent
