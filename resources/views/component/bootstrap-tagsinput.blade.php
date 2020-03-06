@push('styles')
    <link href="{{ asset('vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <style>
        .bootstrap-tagsinput {
            min-width: 100%;
            border: 1px solid #e5ebec;
            border-radius: 0;
            box-shadow: none;
            display: block;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
@endpush
