<div class="scroll-sidebar">
    @yield('left-sidebar')
</div>


@push('styles')
<link href="{{ asset('ui/menu-left/menu-left.css') }}" rel="stylesheet">
@endpush
@push('scripts')
<script type="text/javascript" src="{{ asset('ui/menu-left/menu-left.js') }}"></script>
@endpush
