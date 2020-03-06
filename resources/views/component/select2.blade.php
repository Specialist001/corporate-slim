@push('styles')
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endpush
