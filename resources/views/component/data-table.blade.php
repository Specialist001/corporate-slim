{{--@push('styles')--}}
{{--    <link href="{{ asset('vendor/data-tables/css/bootstrap-select.min.css') }}" rel="stylesheet">--}}
{{--@endpush--}}

@push('scripts')
    <script src="{{ asset('vendor/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-tables/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            $('#{{$id}}').DataTable();
        });
    </script>
@endpush
