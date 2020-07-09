{{--<button type="button" class="{{$class}}" data-toggle="modal" data-target="#{{$id}}" >--}}
{{--    {{ $label }}--}}
{{--</button>--}}

<!-- Modal -->

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

            $('#addValue').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({
                    data: $('#optionValues').serialize(),
                    url: "{{ route('admin.options.setOptionValue') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
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
                console.log(option_value);

                $(this).html('Sending..');
                $.ajax({
                    data: optionValuesForm.serialize(),
                    url: "/options/putOptionValue",
                    type: 'POST',
                    // dataType: 'json',
                    async: true,
                    success: function (data) {
                        // $('#productForm').trigger("reset");
                        // table.draw();
                        $('#option_value').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }

                });
            });

            $('#deleteValue').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({
                    data: $('#optionValues').serialize(),
                    url: "/options/putOptionValue",
                    type: "PUT",
                    dataType: 'json',
                    success: function (data) {
                        // $('#productForm').trigger("reset");
                        // table.draw();
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
