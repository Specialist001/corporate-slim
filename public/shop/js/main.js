$(document).ready(() => {


    $('.lc_favourite_icon').on('click', function () {
        if ($(this).hasClass('flip-horizontal-bottom')) {
            $(this).removeClass('flip-horizontal-bottom');
            $(this).addClass('flip-horizontal-top');
        } else {
            $(this).removeClass('flip-horizontal-top');
            $(this).addClass('flip-horizontal-bottom');
        }
        return false;
    });

    $('.about-dropdown .dropdown-item').on('click', function () {
        $('.about-dropdown button').html($(this).html());
        $('#about_tab a[href="' + $(this).attr('href') + '"]').tab('show')
    });

    $('#about_tab a').on('click', function (e) {
        e.preventDefault()
        $('.about-dropdown button').html($(this).html());
        $(this).tab('show')
    })

    // console.log($('.products .product p').html().length);
    // let maxLength = 140;
    // if($('.products .product p').html().length > maxLength) {
    //     $('.products .product p').html().slice(10);
    //     console.log($('.products .product p').html().length);
    // }

    new WOW().init();

    // $('header').on('click', '.search-toggle', function (e) {
    //     let selector = $(this).data('selector');
    //     let mobileBars = $(selector + ' ~ svg');
    //
    //     $(mobileBars).toggleClass('show');
    //     $(selector).toggleClass('show').find('.search-input').focus();
    //     $('header .search-box').toggleClass('active');
    //     $(this).toggleClass('active');
    //
    //     e.preventDefault();
    // });

    //Сlosing other modals

    $(document).on('shown.bs.modal', function (e) {
        let modals = $('.modal'),
            target = $(e.target).attr('id');

        for(let i = 0; i < modals.length; i++) {

            if($(modals[i]).attr('id') != target) {
                $(modals[i]).modal('hide');
            }
        }
    });

    //Search

    $(document).on('click', function (e) {
        $this = $(e.target);
        $parents = $this.parents('.search-btn');
        
        // console.log($this);
        // console.log($parents);
        // console.log($this.is('.search-btn'));
        // console.log($parents.is('.search-btn'));

        // console.log($this.not('#search-input'))

        if ($parents.is('.search-btn') || $this.is('.search-btn')) {
            $('body').toggleClass('search-opened');
            setTimeout(function(){
                $('#search-input').focus();
            }, 100);
        } else {
            if ($this.is('#search-input')) return false;
            $('body').removeClass('search-opened');
        }

        
    });

    $(document).mouseup(function (e) {
        let headerSearch = $('header .search'),
            menuBar = $('.mobile-menu'),
            bascetMenu = $('.bascet-menu'),
            toOrderModal = $('#to-order-modal'),
            autorizationModal = $('#autorization-modal'),
            registrationModal = $('#registration-modal');

        if(!headerSearch.is(e.target) && headerSearch.has(e.target).length === 0 && headerSearch.hasClass('active')) {
            headerSearch.removeClass('active');
            $('body').removeClass('hide-scroll');
        }
        if(!menuBar.is(e.target) && menuBar.has(e.target).length === 0 && menuBar.hasClass('active')) {
            menuBar.removeClass('active');
            $('body').removeClass('hide-scroll');
        }
        if((!bascetMenu.is(e.target) && bascetMenu.has(e.target).length === 0 && bascetMenu.hasClass('active')) && ((!toOrderModal.is(e.target) && toOrderModal.has(e.target).length === 0 ) && (!autorizationModal.is(e.target) && autorizationModal.has(e.target).length === 0) && (!registrationModal.is(e.target) && registrationModal.has(e.target).length === 0))) {
            bascetMenu.removeClass('active');
            $('body').removeClass('hide-scroll');
        }
    });

    $('.menu__bar').on('click', () => {
        if ($('.bascet-menu').hasClass('active')) {
            $('.bascet-menu').removeClass('active');
        }
        $('.mobile-menu').addClass('active');
        $('body').addClass('hide-scroll');
    });
    $('.mobile-menu .exit').on('click', () => {
        $('.mobile-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });
    $('.swiper-slide').on('click', () => {
        $('.mobile-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });
    $('.swiper-slide').on('click', () => {
        $('.bascet-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });
    $('.to-order button').on('click', () => {
        $('.bascet-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });
    $('.user-buttons a').on('click', () => {
        $('.bascet-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });

    //Star

    $('.star').click(function() {
        if ($('.star span').hasClass("fa-star")) {
            $('.star').removeClass('active')
            setTimeout(function() {
                $('.star').removeClass('active-2')
            }, 30)
            $('.star').removeClass('active-3')
            setTimeout(function() {
                $('.star span').removeClass('fa-star')
                $('.star span').addClass('fa-star-o')
            }, 15)
        } else {
            $('.star').addClass('active')
            $('.star').addClass('active-2')
            setTimeout(function() {
                $('.star span').addClass('fa-star')
                $('.star span').removeClass('fa-star-o')
            }, 150)
            setTimeout(function() {
                $('.star').addClass('active-3')
            }, 150);
        }
    })
    //Bascet

    $('#bascet-button').on('click', () => {
        if ($('.mobile-menu').hasClass('active')) {
            $('.mobile-menu').removeClass('active')
        }
        if (!$('.bascet-menu').hasClass('not-product')) {
            $('.bascet-menu').addClass('active');
            $('body').addClass('hide-scroll');
        }
        else {
            $('#bascet-button').addClass('shake');
            setTimeout(function () {
                $('#bascet-button').removeClass('shake');
            }, 500);
        }
    });

    let bascetItemsLength = $('.bascet-item').length;
    $('header #bascet-button .bascetCount').html(bascetItemsLength);

    $('.bascet-menu > .exit').on('click', () => {
        let bascetItemsLength = $('.bascet-item').length;
        $('header #bascet-button .bascetCount').html(bascetItemsLength);
        $('.bascet-menu').removeClass('active');
        $('body').removeClass('hide-scroll');
    });

    $('.counters').on('input', function () {
        let item = $(this).closest('.counters');
        testNumber(item);
    });

    function testNumber(item){
        let input = item.find('input[type=number].quantity'),
            count = +input.val();

        let minus = item.find('.minus-count'),
            plus = item.find('.plus-count');

        if (count >= 99) {
            plus.addClass('disabled');
            input.val(99);
        } else {
            plus.removeClass('disabled');
        }

        if (count <= 1) {
            minus.addClass('disabled');
            input.val(1);
        } else {
            minus.removeClass('disabled');
        }
    }
   
    $('.counters').on('click', 'a.plus-count', function () {
        let item = $(this).closest('.counters');
        let count = +item.find('input[type=number].quantity').val() + 1;
        let bascetItemsLength = $('.bascet-item').length;
        $('header #bascet-button .bascetCount').html(bascetItemsLength);
        item.find('input[type=number].quantity').val(count);
        testNumber(item);
    });

    $('.counters').on('click', 'a.minus-count', function () {
        let item = $(this).closest('.counters');
        let count = +item.find('input[type=number].quantity').val() - 1;
        let bascetItemsLength = $('.bascet-item').length;
        $('header #bascet-button .bascetCount').html(bascetItemsLength);
        item.find('input[type=number].quantity').val(count);
        testNumber(item);
    });

    $('.counters').each(function(){
        let item = $(this);
        testNumber(item);
    });

    $('.bascet .bascet-item').on('click', '.exit', function () {
        function isEmpty(el) {
            return !$.trim(el.html())
        }

        if (!isEmpty($('.bascet').find('.bascet-item'))) {
            let selector = $(this);
            $(this).closest('.bascet-item').addClass('animated fadeOutRight');
            setTimeout(function () {
                selector.closest('.bascet-item').remove();
                let length = $('.bascet').find('.bascet-item').length;
                $('header #bascet-button .bascetCount').html(length);
                if (length == 0) {
                    let bascetMenu = $('.bascet-menu');

                    bascetMenu.removeClass('active');
                    bascetMenu.addClass('not-product');
                }
            }, 500);
        }
    });
    $('.bascet ').on('click', '#bascet-clear', function () {

        let selectors = $('.bascet .bascet-item');

        for (let i = 0; i < selectors.length; i++) {
            $(selectors[i]).addClass('animated fadeOutRight');
            setTimeout(function () {
                selectors[i].remove();
            }, 500);
        }

        let bascetMenu = $('.bascet-menu');

        setTimeout(function () {
            bascetMenu.removeClass('active');
            bascetMenu.addClass('not-product');
            let bascetItemsLength = $('.bascet-item').length;
            $('header #bascet-button .bascetCount').html(bascetItemsLength);
        }, 700);
        $('html').removeAttr('style');
    });

    //Product-desc

    

    $(window).scroll(function(){
        $('.products > li:nth-child(1)').toggleClass('fixed', $(this).scrollTop() > 520);
    });
    //Sliders

    function swiper(container) {

        let sliderSelector = container + ' .swiper-container',
            interleaveOffset = 0.1;

        //Options

        let sliderOptions = {
            pagination: {
                el: container + ' .swiper-pagination',
                clickable: true
            },
            direction: 'horizontal',
            speed: 1000,
            loop: true,
            // autoplay: {
            //     delay: 3000
            // },
            loopAdditionalSlides: 10,
            grabCursor: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: container + ' .swiper-button-next',
                prevEl: container + ' .swiper-button-prev',
            },
            on: {
                init: function () {
                    this.autoplay.stop();
                    let swiper = $(this)[0];
                    let slideCaptions = $(swiper.slides[swiper.activeIndex]).find('.caption');
                    for (let i = 0; i < slideCaptions.length; i++) {
                        $(slideCaptions[i]).attr('style', 'transition:' + ($(slideCaptions[i]).index() * 100 + 400) + 'ms;transition-delay:' + i + '00ms');
                        $(slideCaptions[i]).addClass('show');
                    }
                    this.el.classList.remove('loading');
                },
                imagesReady: function () {
                    let swiper = $(this)[0];
                    let slideCaptions = $(swiper.slides[swiper.activeIndex]).find('.caption');
                    for (let i = 0; i < slideCaptions.length; i++) {
                        $(slideCaptions[i]).attr('style', 'transition:' + ($(slideCaptions[i]).index() * 100 + 400) + 'ms;transition-delay:' + i + '00ms');
                        $(slideCaptions[i]).addClass('show');
                    }
                    this.el.classList.remove('loading');
                    this.autoplay.start();

                },
                transitionEnd: function () {
                    let swiper = $(this)[0];
                    $(' .caption').removeClass('show');
                    let slideCaptions = $(swiper.slides[swiper.activeIndex]).find('.caption');
                    for (let i = 0; i < slideCaptions.length; i++) {
                        $(slideCaptions[i]).attr('style', 'transition:' + ($(slideCaptions[i]).index() * 100 + 400) + 'ms;transition-delay:' + i + '00ms');
                        $(slideCaptions[i]).addClass('show');
                    }
                },
                progress: function () {
                    let swiper = $(this)[0];
                    for (let i = 0; i < swiper.slides.length; i++) {
                        let slideProgress = swiper.slides[i].progress,
                            innerOffset = swiper.width * interleaveOffset,
                            innerTranslate = slideProgress * innerOffset;
                        $(swiper.slides[i]).find(".slide-bgimg").css("transform", "translate3d(" + innerTranslate + "px, 0, 0)");
                    }
                },
                touchStart: function () {
                    let swiper = $(this)[0];
                    for (let i = 0; i < swiper.slides.length; i++) {
                        $(swiper.slides[i]).css('transition', ' ');
                    }
                },
                setTransition: function (speed) {
                    let swiper = $(this)[0];
                    for (let i = 0; i < swiper.slides.length; i++) {
                        $(swiper.slides[i]).css('transition', speed + "ms");
                        $(swiper.slides[i]).find(".slide-bgimg").css('transition', speed + "ms");
                    }
                }
            },
        };
        let startSwiper = new Swiper(sliderSelector, sliderOptions);
    }

    swiper('.sliders .swiper');
    $('.sliders .owl .owl-carousel').owlCarousel({
        navText: [
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>",
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>"],
        dots: false,
        responsive: {
            0: {
                items: 2,
                nav: true,
                dots:true,
            },
            400: {
                nav: true,
                items: 2,
                dots:true,
            },
            992: {
                items: 4,
                nav: true
            },
            1200: {
                items: 5,
                nav: true
            }
        }
    });

    //Partners

    $('.partners .owl-carousel').owlCarousel({
        autoplay: true,
        navigation: true,
        navText: [
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>",
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>"],
        responsive: {
            0: {
                items: 1,
                nav: false,
                autoWidth:true,
            },
            400: {
                nav: false,
                items: 2,
                autoWidth:true
            },
            768: {
                items: 3,
                nav: true
            },
            992: {
                items: 4,
                nav: true
            }
        }
    });

    //Product photo

    $('.product-photo .owl-carousel').owlCarousel({
        nav:false,
        items:1,
        dots: true,
        loop:false,
        // animateOut: 'slideOutUp',
        // animateIn: 'slideInUp',
        responsive:{
            0:{
                mouseDrag: true,
                touchDrag: true
            },
            992:{
                mouseDrag: false,
                touchDrag: false
            }
        }
    });

   
    function dots(){
        let dotcount = 1;

        let owlDot = $('.product-photo .owl-carousel .owl-dot');


        owlDot.each(function() {
            $(this).addClass( 'dotnumber' + dotcount);
            $(this).attr('data-info', dotcount);
            dotcount=dotcount+1;
        });

        let slidecount = 1;

        $('.product-photo .owl-carousel .owl-item').not('.cloned').each(function() {
            $(this).addClass( 'slidenumber' + slidecount);
            slidecount=slidecount+1;
        });

        

        owlDot.each(function() {

            grab = $(this).data('info');

            slidegrab = $('.slidenumber'+ grab +' img').attr('src');

            $(this).css("background-image", "url("+slidegrab+")");

        });

        amount = owlDot.length;
        gotowidth = 100/amount;

        owlDot.css("width", '25%');
        newwidth = owlDot.width();
        owlDot.css("height", 80);
    }

    dots();
    


    // Product bottom slider

    $('.bottom-slider .owl .owl-carousel').owlCarousel({
        autoplay:false,
        autoplayHoverPause:true,
        navText: [
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>",
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>"],
        responsive: {
            0: {
                items:2,
                dots:true
            },
            400:{
                items:2,
                dots:true
            },
            992:{
                nav: false,
                items:2,
                dots:false
            },
            1200: {
                nav: true,
                items:3,
                dots:false
            }
        }
    });

    //Personal Page

    $('.pen').on('click', function (e){
        $(this).addClass('active');
        
        let $this = $(this);

        let $form = $this.closest('form'),
            $group = $form.find('.personal-info__item'),
            $inputFields = $form.find('input'),
            $submitButton = $form.find('button[type=submit]');
            $link = $form.find('.link-red');

        $inputFields.addClass('edit');
        $submitButton.addClass('edit');
        $link.addClass('edit');
        $group.addClass('edit')


        $inputFields.removeAttr('disabled');
    });

    $('.favorites').on('click', '.heart', function () {
        let parent = $(this).closest('.favorites-main__item');

        parent.addClass('animated fadeOut');

        setTimeout(function () {
            parent.remove();
        }, 1000);

    });

   
    $('.user-bascet .user-bascet-main .user-bascet-main-item').on('click', '.exit', function () {
        function isEmpty(el) {
            return !$.trim(el.html())
        }

        if (!isEmpty($('.user-bascet .user-bascet-main').find('.user-bascet-main-item'))) {
            let selector = $(this);
            $(this).closest('.user-bascet-main-item').addClass('animated zoomOut');
            setTimeout(function () {
                selector.closest('.user-bascet-main-item').remove();
            }, 500);
        }
    });

    


    //News slider

    $('.news-slider .owl-carousel').owlCarousel({
        items:1,
        navText: [
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>",
            "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"15\" viewBox=\"0 0 20 15\">\n" +
            "<path fill=\"#231F20\" fill-rule=\"evenodd\" d=\"M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457\" transform=\"matrix(-1 0 0 1 20 0)\"/>\n" +
            "</svg>"],
        nav:true,
        loop:true
    });

   $('[data-toggle="popover"]').popover();

   var mytabs = [];

   $('.tab-switcher').each(function(){
        var btn = $(this),
            href = btn.attr('href'),
            el = $(href);

        mytabs.push(el[0]);

        btn.click(function(e){
            e.preventDefault();

            console.log($(mytabs));
            console.log($('.tab-switcher'));

            $(mytabs).removeClass('active');
            setTimeout(function(){
                $(mytabs).removeClass('show');
            }, 100);

            el.addClass('active');
            setTimeout(function(){
                el.addClass('show');
            }, 100);

        })
   })

    $(" a ").click(function(){
        $(this).parents(".input-group-btn").find('.btn').text($(this).text());
    });
    $('.dropdown-menu-with-value').each(function(){
        var $this = $(this),
            $dropdown = $this.find('.dropdown-menu'),
            $links = $dropdown.find('a');
            $btn = $this.find('[data-toggle="dropdown"]');

        $links.click(function(e){
            e.preventDefault();
            var text = $(this).html();
            $btn.html(text);
        })
    })

    $('.nav-tabs').each(function(){
        var $this = $(this),
            $tabs = $this.find('a'),
            $indicator = $('<div class="indicator"></div>');

        $this.append($indicator);

        var $active = $tabs.filter('.active');

        tabsIndicator($active[0], $this, $indicator);

        $tabs.on('shown.bs.tab', function (e) {
            tabsIndicator(e.target, $this, $indicator);
        });

        $(window).resize(function(){
            $active = $tabs.filter('.active');
            
            tabsIndicator($active[0], $this, $indicator);
        })

        

    });

    function tabsIndicator(el, parent, indicator){
        var $target = $(el);
        
        var windowWidth = $(window).outerWidth();

        var parentOffsetLeft = parent.offset().left,
            targetOffsetLeft = $target.offset().left,
            targetWidth = $target.outerWidth();
            
        console.log(windowWidth, targetWidth)
            
        parent.parent().animate({
            scrollLeft:targetOffsetLeft - parentOffsetLeft - ((windowWidth - targetWidth) / 2)
        })

        indicator.css({
            left: targetOffsetLeft - parentOffsetLeft,
            width: targetWidth
        })
    }
    

    if ($.fancybox) {
        $.fancybox.defaults.thumbs.autoStart = true;
        $.fancybox.defaults.thumbs.axis = 'x';
        $.fancybox.defaults.buttons = ['close'];
        $.fancybox.defaults.infobar = false;
        $.fancybox.defaults.animationEffect = 'fade';
        $.fancybox.defaults.hash = false;
        $.fancybox.defaults.toolbar = true;
        
        $.fancybox.defaults.backFocus = false;
        $.fancybox.defaults.loop = true;
        
        $.fancybox.defaults.btnTpl.close = 
        `
            <button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 224.512 224.512">
                    <polygon points="224.507,6.997 217.521,0 112.256,105.258 6.998,0 0.005,6.997 105.263,112.254 0.005,217.512 6.998,224.512 112.256,119.24 217.521,224.512 224.507,217.512 119.249,112.254"/>
                </svg>
            </button>
        `;
        $.fancybox.defaults.btnTpl.arrowLeft = 
        `
            <button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 15" style="transform:rotate(180deg)">
                    <path d="M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457" transform="matrix(-1 0 0 1 20 0)"></path>
                </svg>
            </button>
        `;
        $.fancybox.defaults.btnTpl.arrowRight = 
        ` 
            <button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 15" style="transform:rotate(0deg)">
                    <path d="M19.5,7.00060457 L1.831,7.00060457 L8.829,0.876604566 C9.037,0.694604566 9.058,0.378604566 8.876,0.171604566 C8.694,-0.0373954342 8.379,-0.0583954342 8.171,0.124604566 L0.171,7.12460457 C0.166,7.12760457 0.165,7.13360457 0.16,7.13760457 C0.152,7.14560457 0.144,7.15360457 0.136,7.16160457 C0.133,7.16560457 0.127,7.16760457 0.124,7.17160457 C0.109,7.18860457 0.104,7.20960457 0.092,7.22760457 C0.076,7.25060457 0.058,7.27060457 0.047,7.29460457 C0.042,7.30560457 0.039,7.31560457 0.035,7.32560457 C0.025,7.35260457 0.022,7.37860457 0.017,7.40660457 C0.012,7.43260457 0.004,7.45760457 0.003,7.48460457 C0.003,7.49060457 0,7.49460457 0,7.50060457 C0,7.50660457 0.003,7.51060457 0.003,7.51660457 C0.004,7.54360457 0.012,7.56860457 0.017,7.59460457 C0.022,7.62260457 0.025,7.64860457 0.035,7.67560457 C0.039,7.68560457 0.042,7.69560457 0.047,7.70660457 C0.058,7.73060457 0.076,7.75060457 0.092,7.77360457 C0.104,7.79160457 0.109,7.81260457 0.124,7.82960457 C0.127,7.83360457 0.132,7.83460457 0.136,7.83860457 C0.144,7.84760457 0.152,7.85560457 0.16,7.86360457 C0.165,7.86760457 0.166,7.87360457 0.171,7.87660457 L8.171,14.8766046 C8.266,14.9596046 8.383,15.0006046 8.5,15.0006046 C8.639,15.0006046 8.777,14.9426046 8.876,14.8296046 C9.058,14.6226046 9.037,14.3066046 8.829,14.1246046 L1.831,8.00060457 L19.5,8.00060457 C19.776,8.00060457 20,7.77660457 20,7.50060457 C20,7.22460457 19.776,7.00060457 19.5,7.00060457" transform="matrix(-1 0 0 1 20 0)"></path>
                </svg>
            </button>
        `;
        
    }

    /* После натяжки нужно удалить этот код */

    $('.btn-toggle').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
    })
    
    $('[data-pattern]').each(function(){
        var $this = $(this);
        
        var pattern = new RegExp($this.data('pattern'));
        
        $this.keypress(function(e){
            var key = e.key;
            
            if (!pattern.test(key)) return false;
        });
        
    });

});