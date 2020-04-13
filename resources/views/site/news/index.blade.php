@extends('site.wrapper')

@section('title')
    @lang('common.titles.news')
@endsection

@section('center_content')
    <!-- bradcam_area  -->
    <div class="bradcam_area">
        <div class="bradcam_shap">
            <img src="{{ asset('images/ilstrator/bradcam_ils.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>@lang('common.titles.news')</h3>
                        <nav class="brad_cam_lists">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('common.titles.main')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('common.titles.news')</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        <ul>
            <li v-for="skill in skills" v-text="skill"></li>
        </ul>
    </div>
    <!-- /bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @if($news->isNotEmpty())
                            @foreach($news as $item)
                                <article class="blog_item">
                                    <div class="blog_item_img">
{{--                                        <img class="card-img rounded-0" src="{{ asset('images/blog/single_blog_1.png') }}" alt="">--}}
                                        <img class="card-img rounded-0" src="{{ $item->imageUrl() }}" alt="">
                                        <a href="#" class="blog_item_date">
                                            <?php \Carbon\Carbon::setLocale('ru'); ?>
                                            <h3>{{ $item->created_at->format('d / m') }}</h3>
{{--                                            <p>{{ $item->created_at->format('m') }}</p>--}}
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{ route('site.news.show', $item->slug) }}">
                                            <h2>{{ $item->title }}</h2>
                                        </a>
                                        <p>{{ $item->short }}</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-calendar"></i> {{ $item->created_at->format('d.m.Y') }}</a></li>
                                            <li><a href="#"><i class="fa fa-eye"></i> {{ $item->views }}</a></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach
                        @endif

                        {{--@slot('bottom')--}}
                            @include('common.blog-pagination', ['data' => $news])
                        {{--@endslot--}}
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('site.news._right-sidebar', ['lastNews' => $lastNews])
                </div>
            </div>
        </div>
    </section>
    <!--================ /Blog Area =================-->
@endsection
