@push('styles')
    <link href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endpush
