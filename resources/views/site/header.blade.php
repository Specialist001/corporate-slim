<div class="header-area ">
    <div id="sticky-header" class="main-header-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2">
                    <div class="logo header__logo d-inline-block w-25 ml-4">
                        <a href="{{ route('site.home') }}">
                            <img src="{{ asset('images/cs_logo.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="main-menu  d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ route('site.home') }}">@lang('common.titles.main')</a></li>
                                <li><a href="{{ route('site.news.index') }}">@lang('common.titles.news')</a></li>
                                <li><a href="#">@lang('common.titles.services') <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        @foreach($serviceCategories as $serviceCategory)
                                        <li><a href="{{ route('site.services.show', $serviceCategory->slug) }}">{{ $serviceCategory->title }}</a></li>

                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
{{--                                <li><a href="#service_area">Services 1</a></li>--}}
                                <li><a href="#case_study_area">Case Study</a></li>
                                <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="single-blog.html">single-blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 main-menu d-none d-lg-block">
                    <nav class="d-inline-block">
                        <ul id="navigation">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('images/lang/flag-'.LaravelLocalization::getCurrentLocale().'.png') }}"
                                        alt="{{LaravelLocalization::getCurrentLocale()}}"
                                        class="align-middle" >
                                    <span class="" style="text-transform: uppercase">{{LaravelLocalization::getCurrentLocale()=='ru' ? 'РУ' : LaravelLocalization::getCurrentLocale()}}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="submenu" style="width: 110px; right: -18px; left: inherit">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if($localeCode != LaravelLocalization::getCurrentLocale())
                                    <li>
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <img src="{{ asset('images/lang/flag-'.$localeCode.'.png') }}"
                                                 alt="{{$localeCode}}" class="align-middle">
                                            <span class="" style="text-transform: uppercase">{{ $localeCode == 'ru' ? 'РУ' : $localeCode }}</span>
                                        </a>
                                    </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="Appointment d-inline-block">
                        <div class="book_btn d-none d-lg-block">
                            <a  href="#"> <i class="fa fa-phone"></i> +10 673 567 367</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>

        </div>
    </div>
</div>
