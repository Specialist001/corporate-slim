<div class="container">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto col-md-auto text-center">
            <div class="logo-block">
                <a href="./index.html">
                    <img src="{{asset('images/shop/svg/logo.svg')}}" class="d-none d-lg-block">
                    <img src="{{asset('images/shop/svg/logo-mob.svg')}}" class="d-block d-lg-none" alt="">
                </a>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div class="contacts__items">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/shop/svg/phone.svg')}}">
                        <span>
                                    <p class="desc">
                                        Офис
                                    </p>
                                    <p class="number">
                                        71 253 00 01
                                    </p>
                                </span>
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a type="tel" class="dropdown-item" href="tel:+998 71 253 00 01">
                            <img src="{{asset('images/shop/svg/phone.svg')}}">
                            <span>
                                <p class="desc">Офис</p>
                                <p class="number">71 253 00 01</p>
                            </span>
                        </a>
                        <a type="tel" class="dropdown-item" href="tel:+998 71 253 00 74">
                            <img src="{{asset('images/shop/svg/phone.svg')}}">
                            <span>
                                <p class="desc">Магазин</p>
                                <p class="number">71 253 00 74</p>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col d-none d-md-block px-0"></div>

        <div class="col-auto d-none d-lg-block ml-auto">
            <form action="" id="search-form">
                <input type="search" placeholder="Текст для поиска..." id="search-input">
            </form>
            <nav>
                <ul class="nav__items">
                    <li class="nav__item">
                        <div class="search-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15">
                                <path fill="#000000" fill-rule="evenodd" d="M6.32137015,11.3846576 C3.52651937,11.3846576 1.2551363,9.11323625 1.2551363,6.32137015 C1.2551363,3.52950405 3.52651937,1.2551363 6.32137015,1.2551363 C9.11323625,1.2551363 11.3877953,3.52950405 11.3877953,6.32137015 C11.3877953,9.11323625 9.11323625,11.3846576 6.32137015,11.3846576 M14.816241,13.9346494 L11.2102066,10.328615 C12.104043,9.23878432 12.6427403,7.8428704 12.6427403,6.32137015 C12.6427403,2.83162362 9.81111667,0 6.32137015,0 C2.82863894,0 0,2.83162362 0,6.32137015 C0,9.81111667 2.82863894,12.6427403 6.32137015,12.6427403 C7.8428704,12.6427403 9.23564657,12.1070277 10.3254773,11.2131913 L13.9315117,14.816241 C14.1764854,15.061253 14.5714204,15.061253 14.816241,14.816241 C15.061253,14.5744051 15.061253,14.1764854 14.816241,13.9346494"/>
                            </svg>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="./about.html">
                            О компании
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="./catalog.html">
                            Каталог
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="./contacts.html">
                            Контакты
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-auto order-first order-md-0 ml-md-auto" style="font-size:0;">
            <button class="menu__bar">
                <svg width="20" height="16" viewBox="0 0 20 16">
                    <g fill="#000000" fill-rule="evenodd">
                        <path d="M.8164 2L19.1834 2C19.6344 2 20.0004 1.634 20.0004 1.184L20.0004.816C20.0004.366 19.6344 0 19.1834 0L.8164 0C.3654 0 .0004.366.0004.816L.0004 1.184C.0004 1.634.3654 2 .8164 2M.8164 9L19.1834 9C19.6344 9 20.0004 8.634 20.0004 8.184L20.0004 7.816C20.0004 7.366 19.6344 7 19.1834 7L.8164 7C.3654 7 .0004 7.366.0004 7.816L.0004 8.184C.0004 8.634.3654 9 .8164 9M.8164 16L19.1834 16C19.6344 16 20.0004 15.634 20.0004 15.184L20.0004 14.816C20.0004 14.366 19.6344 14 19.1834 14L.8164 14C.3654 14 .0004 14.366.0004 14.816L.0004 15.184C.0004 15.634.3654 16 .8164 16"/>
                    </g>
                </svg>
            </button>
        </div>
        <div class="col-auto ml-md-auto d-block d-lg-none">
            <button type="button" data-toggle="modal" data-target="#phone-modal" class="px-0">
                <img src="{{asset('images/shop/svg/phone.svg')}}">
            </button>
        </div>
        <div class="col-auto ml-md-auto ml-md-0">
            <div id="bascet-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 20 25" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g fill="none" fill-rule="evenodd">
                        <path fill="#231F20" d="M16.2491816,23.6197597 L3.75049901,23.6197597 C2.4525982,23.6197597 1.4001616,22.7608001 1.37978609,21.7025818 L2.74903312,6.24763548 L5.05868338,6.24763548 L5.05868338,8.34355828 C5.05868338,8.72699387 5.365338,9.03367843 5.74857643,9.03367843 C6.13181486,9.03367843 6.4384056,8.72699387 6.4384056,8.34355828 L6.4384056,6.24763548 L13.5562929,6.24763548 L13.5562929,8.34355828 C13.5562929,8.72699387 13.8629476,9.03367843 14.246186,9.03367843 C14.6294244,9.03367843 14.9360152,8.72699387 14.9360152,8.34355828 L14.9360152,6.24763548 L17.2457293,6.24763548 L18.6202139,21.7025818 C18.5997745,22.7608001 17.5421003,23.6197597 16.2491816,23.6197597 M9.99990419,1.38049591 C11.9364718,1.38049591 13.5156058,2.93468814 13.5562929,4.86189928 L6.4433877,4.86189928 C6.48439421,2.93468814 8.06314492,1.38049591 9.99990419,1.38049591 M19.9947624,21.6104934 L18.5640695,5.49092536 C18.5334104,5.13292434 18.2319934,4.86189928 17.879414,4.86189928 L14.9360152,4.86189928 C14.8951364,2.17280164 12.6979666,0 9.99990419,0 C7.30190565,0 5.10479974,2.17280164 5.0638571,4.86189928 L2.1205221,4.86189928 C1.76302452,4.86189928 1.46658959,5.13292434 1.43586665,5.49092536 L0.00498209957,21.6104934 C0.00498209957,21.6309433 0,21.6513931 0,21.671907 C0,23.5071575 1.68107537,25 3.75049901,25 L16.2491816,25 C18.3187969,25 20,23.5071575 20,21.671907 C20,21.6513931 20,21.6309433 19.9947624,21.6104934" />
                    </g>
                </svg>
                <span class="bascetCount">
                            0
                        </span>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div id="user-button">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownUserButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/shop/svg/login.svg')}}">
                        <span>Войти</span>
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./personal-page.html">
                                        <span>
                                            Мои данные
                                        </span>
                        </a>
                        <a class="dropdown-item" href="./personal-page.html">
                                        <span>
                                            Мои заказы
                                        </span>
                        </a>
                        <a class="dropdown-item" href="./personal-page.html">
                                        <span>
                                            Избранное
                                        </span>
                            <span>
                                            10
                                        </span>
                        </a>
                        <a class="dropdown-item" href="./personal-page.html">
                                        <span>
                                            Корзина
                                        </span>
                            <span>
                                            10
                                        </span>
                        </a>
                        <a class="dropdown-item" href="#">
                                        <span>
                                            Выход
                                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="mobile-menu">
    <div class="mobile-menu__search d-block d-md-none">
        <form action="">
            <input type="text">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                    <path fill="#000000" fill-rule="evenodd" d="M6.32137015,11.3846576 C3.52651937,11.3846576 1.2551363,9.11323625 1.2551363,6.32137015 C1.2551363,3.52950405 3.52651937,1.2551363 6.32137015,1.2551363 C9.11323625,1.2551363 11.3877953,3.52950405 11.3877953,6.32137015 C11.3877953,9.11323625 9.11323625,11.3846576 6.32137015,11.3846576 M14.816241,13.9346494 L11.2102066,10.328615 C12.104043,9.23878432 12.6427403,7.8428704 12.6427403,6.32137015 C12.6427403,2.83162362 9.81111667,0 6.32137015,0 C2.82863894,0 0,2.83162362 0,6.32137015 C0,9.81111667 2.82863894,12.6427403 6.32137015,12.6427403 C7.8428704,12.6427403 9.23564657,12.1070277 10.3254773,11.2131913 L13.9315117,14.816241 C14.1764854,15.061253 14.5714204,15.061253 14.816241,14.816241 C15.061253,14.5744051 15.061253,14.1764854 14.816241,13.9346494"></path>
                </svg>
            </button>
        </form>
    </div>
    <hr class="d-block d-md-none" style="margin-top: 5px;">
    <div class="user-button d-block d-md-none">
        <a href="./personal-page.html">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                                <g>
                                    <path d="M612,306.036C612,137.405,474.595,0,305.964,0S0,137.405,0,306.036c0,92.881,42.14,176.437,107.698,232.599   c0.795,0.795,1.59,1.59,3.108,2.313C163.86,585.473,231.804,612,306.759,612c73.365,0,141.309-26.527,194.363-69.462   c3.108-0.795,5.493-3.108,7.011-5.493C571.451,480.088,612,398.122,612,306.036z M28.117,306.036   c0-153.018,124.901-277.919,277.919-277.919s277.919,124.901,277.919,277.919c0,74.955-29.635,142.826-78.063,192.845   c-7.806-36.719-31.225-99.169-103.072-139.718c16.408-20.311,25.732-46.838,25.732-74.955c0-67.149-54.644-121.793-121.793-121.793   s-121.793,54.644-121.793,121.793c0,28.117,10.119,53.849,25.732,74.955c-72.497,40.549-95.916,103-102.928,139.718   C58.547,449.658,28.117,380.991,28.117,306.036z M212.36,284.93c0-51.536,42.14-93.676,93.676-93.676s93.676,42.14,93.676,93.676   s-42.14,93.676-93.676,93.676S212.36,336.466,212.36,284.93z M132.707,523.023c1.59-22.624,14.022-99.169,98.374-142.104   c21.106,16.408,46.838,25.732,74.955,25.732c28.117,0,54.644-10.119,75.75-26.527c83.556,42.935,96.784,117.89,99.169,142.104   c-47.633,38.237-108.493,61.655-174.052,61.655C240.478,583.955,180.34,561.331,132.707,523.023z"></path>
                                </g>
                            </svg>
            <span>
                        Личный кабинет
                    </span>
        </a>
    </div>
    <hr class="d-block d-md-none">
    <ul class="mobile__items">
        <li class="mobile__item">
            <a href="./about.html">
                О компании
            </a>
        </li>
        <li class="mobile__item">
            <a href="./catalog.html">
                Каталог
            </a>
        </li>
        <li class="mobile__item">
            <a href="./service.html">
                Сервис
            </a>
        </li>
        <li class="mobile__item">
            <a href="./partners.html">
                Партнёры
            </a>
        </li>
        <li class="mobile__item">
            <a href="./news.html">
                Новости
            </a>
        </li>
        <li class="mobile__item">
            <a href="./payment.html">
                Оплата и доставка
            </a>
        </li>
        <li class="mobile__item">
            <a href="./contacts.html">
                Контакты
            </a>
        </li>
    </ul>
    <div class="exit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <g fill="none" fill-rule="evenodd" stroke="#000000" transform="translate(1 1)" stroke-linecap="round" stroke-linejoin="round">
                <path stroke-width="2" d="M0 0L14 14M14 0L0 14"/>
            </g>
        </svg>
    </div>
    <hr>
    <div class="mobile__callback">
        <div class="d-none d-md-block">
            <p>
                Закажите звонок <br>
                <span>
                        Заполните поля ниже и мы перезвоним вам
                    </span>
            </p>
            <form action="#">
                <input type="text" placeholder="Имя" data-pattern="[A-Za-z]">
                <input type="number" placeholder="Ваш телефон" data-pattern="[\+\d]">
                <button type="submit">
                    Заказать звонок
                </button>
            </form>
        </div>
        <a data-toggle="modal" data-target="#to-order-modal" class="d-block d-md-none exit" >Заказать звонок</a>
    </div>
    <hr>
    <div class="mobile__social">
        <p>
            Мы в ооциальных сетях
        </p>
        <div>
            <a href="https://t.me/specmagazin2">
                <img src="{{asset('images/shop/svg/tg.svg')}}">
            </a>
            <a href="https://www.facebook.com/liniyazashiti/">
                <img src="{{asset('images/shop/svg/fb.svg')}}">
            </a>
            <a href="https://www.instagram.com/liniya.zashiti/">
                <img src="{{asset('images/shop/svg/instagram.svg')}}">
            </a>
        </div>
    </div>
</div>
