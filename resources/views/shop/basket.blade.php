<section class="bascet">
    <div class="bascet-menu">
        <svg class="exit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <g fill="none" fill-rule="evenodd" stroke="#000000" transform="translate(1 1)" stroke-linecap="round" stroke-linejoin="round">
                <path stroke-width="2" d="M0 0L14 14M14 0L0 14"/>
            </g>
        </svg>
        <form action="">
            <button type="button" id="bascet-clear" class="color-red">
                Очистить заказ
            </button>
            <ul class="bascet-items">
                <li class="bascet-item">
                    <div class="item-desc">
                        <img src="{{asset('images/shop/png/footwear.png')}}">
                        <h5>
                            <span class="desc-company">
                                Discovery
                            </span>
                            Ботинки мужские кожаные
                        </h5>
                        <div class="product-info">
                            <p class="color-grey">
                                <span>
                                    Цвет:
                                </span>
                                <span class="product-color"></span>
                            </p>
                            <p class="color-grey">
                                <span>
                                    Размер:
                                </span>
                                <span class="product-size">
                                    45
                                </span>
                            </p>
                        </div>
                        <div class="bottom-desc">
                            <div class="counters">
                                <a class="plus-count">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <input type="number" class="quantity" value="1" id="inp_1">
                                <a class="minus-count">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                            <div class="price-blocks">
                                <p class="discount">
                                    1.345.000 сумм
                                </p>
                                <p class="price">
                                    1.345.000 сумм
                                </p>
                            </div>
                        </div>
                    </div>
                    <svg class="exit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g fill="none" fill-rule="evenodd" stroke="#000000" transform="translate(1 1)" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke-width="2" d="M0 0L14 14M14 0L0 14"/>
                        </g>
                    </svg>
                </li>
                <li class="bascet-item">
                    <div class="item-desc">
                        <img src="{{asset('images/shop/png/footwear.png')}}">
                        <h5>
                            <span class="desc-company">
                                Discovery
                            </span>
                            Ботинки мужские кожаные
                        </h5>
                        <div class="product-info">
                            <p class="color-grey">
                                <span>
                                    Цвет:
                                </span>
                                <span class="product-color"></span>
                            </p>
                            <p class="color-grey">
                                <span>
                                    Размер:
                                </span>
                                <span class="product-size">
                                    45
                                </span>
                            </p>
                        </div>
                        <div class="bottom-desc">
                            <div class="counters">
                                <a class="plus-count">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <input type="number" class="quantity" value="1" id="inp_1">
                                <a class="minus-count">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                            <div class="price-blocks">
                                <p class="price">
                                    1.345.000 сумм
                                </p>
                            </div>
                        </div>
                    </div>
                    <svg class="exit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g fill="none" fill-rule="evenodd" stroke="#000000" transform="translate(1 1)" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke-width="2" d="M0 0L14 14M14 0L0 14"/>
                        </g>
                    </svg>
                </li>
                <li class="bascet-item">
                    <div class="item-desc">
                        <img src="{{asset('images/shop/png/footwear.png')}}">
                        <h5>
                            <span class="desc-company">
                                Discovery
                            </span>
                            Ботинки мужские кожаные
                        </h5>
                        <div class="product-info">
                            <p class="color-grey">
                                <span>
                                    Цвет:
                                </span>
                                <span class="product-color"></span>
                            </p>
                            <p class="color-grey">
                                <span>
                                    Размер:
                                </span>
                                <span class="product-size">
                                    45
                                </span>
                            </p>
                        </div>
                        <div class="bottom-desc">
                            <div class="counters">
                                <a class="plus-count">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <input type="number" class="quantity" value="1" id="inp_1">
                                <a class="minus-count">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                            <div class="price-blocks">
                                <p class="discount">
                                    1.345.000 сумм
                                </p>
                                <p class="price">
                                    1.345.000 сумм
                                </p>
                            </div>
                        </div>
                    </div>
                    <svg class="exit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g fill="none" fill-rule="evenodd" stroke="#000000" transform="translate(1 1)" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke-width="2" d="M0 0L14 14M14 0L0 14"/>
                        </g>
                    </svg>
                </li>
                <li class="total-price">
                    <p>
                        Итого
                    </p>
                    <div class="price-blocks">
                        <p class="discount">
                            1.345.000 сумм
                        </p>
                        <p class="price">
                            1.345.000 сумм
                        </p>
                    </div>
                </li>


                <li class="to-order">
                    <button type="button" class="" data-toggle="modal" data-target="#to-order-modal">
                        Оплатить
                    </button>
                    <div class="user-buttons">
                        <a class="color-red" data-toggle="modal" data-target="#registration-modal">
                            Регистрация
                        </a>
                        <a class="color-red" data-toggle="modal" data-target="#autorization-modal">
                            Войти
                        </a>
                    </div>
                </li>
            </ul>
        </form>
        <div class="bascet__footer">
            <p>
                Мы принимаем к оплате
            </p>
            <div class="bascet__footer-ditail">
                <svg id='Layer_1' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 138 40'><defs><style>.cls-1{fill:#333;}.cls-2{fill:#3cc;}.cls-3{fill:#fff;}</style></defs><g id='Layer_2' data-name='Layer 2'><g id='Layer_1-2' data-name='Layer 1-2'><path class='cls-1' d='M22.73,3.95a7.1,7.1,0,0,0-1.85-2A9.18,9.18,0,0,0,18.45.77,13.68,13.68,0,0,0,15.56.16,34,34,0,0,0,12.1,0h-10A1.74,1.74,0,0,0,.2,1.62s0,.06,0,.09V17.95a15.37,15.37,0,0,0,6.57,7V21.69a1.92,1.92,0,0,1,1.75-2.08h3q6.14,0,9.37-2.57t3.28-7.62a12,12,0,0,0-.34-2.88A9,9,0,0,0,22.73,3.95Zm-5.86,8.35a3.52,3.52,0,0,1-1.49,1.39,6,6,0,0,1-2.15.57,19.58,19.58,0,0,1-2.47.15H7.88c-.69,0-1.12-.56-1.12-1.38V6.33A1,1,0,0,1,7.88,5.27h2.88q1.4,0,2.64.08a5.76,5.76,0,0,1,2.13.52A3.21,3.21,0,0,1,17,7.19a5.09,5.09,0,0,1,.51,2.52A5.08,5.08,0,0,1,16.87,12.29ZM6.78,25.93A18.19,18.19,0,0,1,.2,21.79v7.85a1.12,1.12,0,0,0,1,1.27H5.72c1.2,0,1.06-1.28,1.06-1.28ZM68.9,8.55H65a1.58,1.58,0,0,0-1.64,1.21L58.83,22.24s-4-11.37-4.3-12.25a1.82,1.82,0,0,0-1.76-1.45H49.18c-1.28,0-1.28,1-1.11,1.39s5.08,13.85,7,19a7.52,7.52,0,0,1,.63,2,5.28,5.28,0,0,1-.76,1.92,4.93,4.93,0,0,1-.5.7c3.7-1.1,8-5.11,10.16-9.44,2.18-6,5.05-14,5.18-14.41C69.92,9.07,69.92,8.55,68.9,8.55ZM51.52,34.77a9.47,9.47,0,0,1-1-.08c-.41-.06-1.19,0-1.19.7v3c0,1.15.56,1.23.85,1.31A12.92,12.92,0,0,0,53,40a7.29,7.29,0,0,0,3.25-.67,7.76,7.76,0,0,0,2.43-1.92,13.29,13.29,0,0,0,1.92-2.88q.83-1.66,1.58-3.67l.58-1.59C61.6,30.42,56.48,35.25,51.52,34.77ZM45.62,12.14a5.26,5.26,0,0,0-.86-1.39,6.06,6.06,0,0,0-1.22-1A8.92,8.92,0,0,0,42,8.91a11.53,11.53,0,0,0-1.69-.51,13.72,13.72,0,0,0-2-.29Q37.23,8,35.89,8q-8.94,0-10.18,5.64a1,1,0,0,0,.88,1.24h3.67c1,0,1-.31,1.38-1.17a2.57,2.57,0,0,1,.86-1.18,5.15,5.15,0,0,1,3.16-.81,4.5,4.5,0,0,1,2.95.73,3.44,3.44,0,0,1,1.09,2.38c0,1.24-.38,2.06-1.92,2.06-3.65-.13-7.57.28-9.78,1.55a7.23,7.23,0,0,0-3.46,6.38,6.52,6.52,0,0,0,.59,2.88,5.71,5.71,0,0,0,1.65,2A7,7,0,0,0,29.26,31a11.53,11.53,0,0,0,3.14.4,13.59,13.59,0,0,0,4.21-.6A15.7,15.7,0,0,0,40,28.89v.7c0,.69.21,1.31,1,1.31h4.25c.86,0,1.06-.61,1.06-1.37V16.44A16.14,16.14,0,0,0,46.14,14,7.68,7.68,0,0,0,45.62,12.14ZM39.81,25s-1.1,2.3-5,2.3a4.41,4.41,0,0,1-2.64-.73,2.61,2.61,0,0,1-1-2.28,2.88,2.88,0,0,1,1.65-2.82,12.59,12.59,0,0,1,4.95-.83,1.81,1.81,0,0,1,2.08,1.8Z'/><path class='cls-2' d='M137,16.58a5,5,0,0,1,0,5.28c-1,1.52-6.45,7.34-8.25,9.21-1.56,1.62-3.67,3.26-5.76,3.26H79.7c-5.86,0-6.21-2-6.21-6.46V9.68c0-4.57,1.35-5.9,5.36-5.9h44.24c2.07,0,3.92,1.06,6,3.2C130.91,8.81,136.28,15.5,137,16.58Z'/><path class='cls-3' d='M83.32,10.81V10.7c0-.59,0-1.16-1-1.16H78.69c-.85,0-.89.46-.89,1.18v4.8A15.17,15.17,0,0,1,83.32,10.81Z'/><path class='cls-3' d='M107.63,28.17v-.26h0V16.33q0-7.27-6.42-7.27a6.4,6.4,0,0,0-3.36,1,12.18,12.18,0,0,0-2.93,2.56,5.1,5.1,0,0,0-2.08-2.63,6.89,6.89,0,0,0-3.61-.85,8.39,8.39,0,0,0-5.11,1.76c-.32.32-6.33,5-6.33,9.88v7.41c0,.23-.12,1.13.89,1.13h3.77c1.17,0,1.06-.77,1.06-1.09v-12c.63-.85,1.92-2.88,4.05-2.88a1.92,1.92,0,0,1,1.76.83,5.25,5.25,0,0,1,.54,2.76v9.35h0v1.92c0,.23-.12,1.13.89,1.13h3.73c1.17,0,1.06-.77,1.06-1.09v-.26h0V16.19c.68-.85,2-2.88,4.05-2.88a2,2,0,0,1,1.79.83,5.18,5.18,0,0,1,.55,2.76v9.35h0v1.92c0,.23-.12,1.13.89,1.13h3.77C107.77,29.24,107.63,28.48,107.63,28.17Z'/><path class='cls-3' d='M128.42,23.46a8.63,8.63,0,0,1-8.54,5.61c-5.76,0-9.6-3.92-9.6-9.8s4-10,9.4-10,9,3.74,9.23,9.77c0,.77-.19,1.45-1.16,1.45H115.53c.08,3.23,1.63,5,4.39,5a3.84,3.84,0,0,0,3.54-2.14,1.36,1.36,0,0,1,1.15-.59h3.15a.63.63,0,0,1,.65.74ZM119.7,13c-2.29,0-3.84,1.59-4.18,4.21h8.2C123.51,14.92,122.27,13,119.7,13Z'/></g></g></svg>
            </div>
        </div>
    </div>
</section>
