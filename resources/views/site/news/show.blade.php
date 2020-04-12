@extends('site.wrapper')

@push('meta')
    @if($news)
        @component('component.meta', [
            'metaTags' => [
                [
                    'name' => 'title',
                    'content' => $news->meta_title,
                ],
                [
                    'name' => 'description',
                    'content' => $news->meta_description ,
                ],
                [
                    'name' => 'keywords',
                    'content' => $news->meta_keywords ,
                ],
            ],
            'ogTags' => [
                [
                    'property' => 'og:title',
                    'content' => $news->title,
                ],
                [
                    'property' => 'og:type',
                    'content' => 'news',
                ],
                [
                    'property' => 'og:description',
                    'content' => $news->meta_description ,
                ],
                [
                    'property' => 'og:url',
                    'content' => url()->current(),
                ],
                [
                    'property' => 'og:image',
                    'content' => $news->imageUrl(),
                ],
            ],
        ])
        @endcomponent
    @endif
@endpush

@section('title')
    @if($news)
        {{$news->title}}
    @endif
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
                        @if($news)
                        <h3>{{ $news->title }}</h3>
                        <nav class="brad_cam_lists">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('common.titles.main')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('site.news.index') }}">@lang('common.titles.news')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    @if($news)
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ $news->imageUrl() }}" alt="{{ $news->slug }}">
                            </div>
                            <div class="blog_details">
                                <h2>
                                    {{ $news->title }}
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
{{--                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>--}}
                                    <li><a href="#"><i class="fa fa-calendar"></i> {{ $news->created_at->format('d.m.Y') }}</a></li>
                                    <li><a href="#"><i class="fa fa-eye"></i> {{ $news->views }}</a></li>
                                </ul>
                                {!! nl2br($news->full) !!}
                            </div>
                        </div>

                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                    people like this</p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                            <div class="navigation-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        @if($previous)
                                        <div class="thumb">
                                            <a href="{{ route('site.news.show', $previous->slug) }}">
                                                <img class="img-fluid" src="{{ $previous->thumbUrl() }}" alt="{{ $previous->slug }}">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('site.news.show', $previous->slug) }}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>@lang('common.previous')</p>
                                            <a href="{{ route('site.news.show', $previous->slug) }}">
                                                <h4>{{ $previous->title }}</h4>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        @if($next)
                                        <div class="detials">
                                            <p>@lang('common.next')</p>
                                            <a href="{{ route('site.news.show', $next->slug) }}">
                                                <h4>{{ $next->title }}</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('site.news.show', $next->slug) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('site.news.show', $next->slug) }}">
                                                <img class="img-fluid" src="{{ $next->thumbUrl() }}" alt="{{ $next->slug }}">
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    @include('site.news._right-sidebar', ['lastNews' => $lastNews])
                </div>
            </div>
        </div>
    </section>
    <!--================ /Blog Area =================-->

@endsection