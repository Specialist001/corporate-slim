@extends('site.wrapper')

@section('title')
    {{ $serviceCategory->title }}
@endsection

@section('center_content')
    <div class="shap_big_2 d-none d-lg-block Another_shap_big">
        <img src="{{ asset('images/ilstrator/big.png') }}" alt="">
    </div>
    <!-- bradcam_area  -->
    <div class="bradcam_area">
        <div class="bradcam_shap">
            <img src="{{ asset('images/ilstrator/bradcam_ils.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>@lang('common.titles.services')</h3>
                        <nav class="brad_cam_lists">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('common.titles.main')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('common.titles.services')</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
    <!-- service_area  -->
    <div class="service_area minus_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="img/svg_icon/seo_1.svg" alt="">
                        </div>
                        <h3>SEO/SEM</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing.</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="img/svg_icon/seo_2.svg" alt="">
                        </div>
                        <h3>Digital Marketing</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing.</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="img/svg_icon/seo_3.svg" alt="">
                        </div>
                        <h3>Social Media</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing.</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/ service_area  -->
@endsection
