@push('styles')
    <link href="{{ asset('admin/toast/css/jquery.toast.css') }}" rel="stylesheet">
@endpush
{{--  <div class="alert alert-{{$type}}">
    {!! $slot !!}
</div>  --}}
@push('scripts')
    

    <script>
        jQuery(document).ready(function() {
            "use strict";
            $.toast({
                heading: "{!! $slot !!}",
                text: "",
                position: "{!! $position !!}",
                loaderBg: '#0ea7a7',
                textColor: '#ffffff',
                icon: "{{$icon}}",
                hideAfter: 3000,
                stack: 6
            });
        });
        
    </script>
@endpush
