@push('styles')
    <link href="{{ asset('vendor/croppie/css/croppie.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/croppie/js/croppie.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 250,
                height: 250,
                type: 'circle' //square
            },
            boundary: {
                width: 350,
                height: 350
            }
        });

        $('#image').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>

@endpush
