{{--<button type="button" class="{{$class}}" data-toggle="modal" data-target="#{{$id}}" >--}}
{{--    {{ $label }}--}}
{{--</button>--}}

<!-- Modal -->
@push('styles')
    <style type="text/css">
        .valueBtn {
            margin: 0 5px 5px 0;
        }
    </style>
@endpush

<div class="modal fade" id="option_value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            <form id="optionValues" method="POST">--}}
{{--                <input type="hidden" value="">--}}
                <div class="modal-body"></div>
{{--            </form>--}}

            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}

        </div>
    </div>
</div>

@push('scripts')
{{--    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>--}}

    <script>
        jQuery(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.valueBtn', function () {
                var value_id = $(this).data('option_value_id');
                $.get("/options/getOptionValue" +'/' + value_id, function (data) {
                    $('#option_value').find('.modal-body').html(data);
                })
            });
            $('body').on('click', '.addValueBtn', function () {
                var value_id = $(this).data('option_id');
                $.get("/options/createOptionValue" +'/' + value_id, function (data) {
                    $('#option_value').find('.modal-body').html(data);
                })
            });

            $('body').on('click', '#addValue', function (e) {
            // $('#addValue').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({
                    data: $('#optionValues').serialize(),
                    url: "/options/addOptionValue",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('.option-values').append("" +
                            "<button type='button' class='btn btn-secondary valueBtn' id='ov_"+data.id+"' data-option_value_id='"+data.id+"' data-toggle='modal' data-target='#option_value'>"
                            + data.name
                            + "</button>");
                        $('#option_value').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '#saveValue', function (e) {
            // $('#saveValue').click(function (e) {
                e.preventDefault();
                var optionValuesForm = $('#optionValues');
                var option_value = optionValuesForm.find("input[name*='option_value']");

                $(this).html('Sending..');
                $.ajax({
                    data: optionValuesForm.serialize(),
                    url: "/options/updateOptionValue",
                    type: 'POST',
                    // dataType: 'json',
                    async: true,
                    success: function (data) {
                        console.log(data.name);
                        $('#ov_'+data.id).html(data.name);
                        $('#option_value').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '#deleteValue', function (e) {
                e.preventDefault();
                var value_id = $(this).data('option_value_id');
                $(this).html('Deleting..');

                $.ajax({
                    data: '',
                    url: "/options/deleteOptionValue" +'/' + value_id,
                    type: "DELETE",
                    dataType: 'json',
                    success: function (data) {
                        $('#ov_'+value_id).remove();
                        $('#option_value').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }

                });
            });

            $('#option_value').on('hidden.bs.modal', function (e) {
                $(this).find('.modal-body').empty();
            })
        });
    </script>
@endpush
