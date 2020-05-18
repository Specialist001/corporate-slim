<?php

Route::group([
    'domain' => config('app.domain'),
    'namespace' => 'Shop',
    'as' => 'shop.'
], function () {
    Route::fallback('ErrorController@notFound')->name('404');

    Route::group([
        'namespace' => 'Auth',
        'as' => 'auth.'
    ], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('loginForm');
        Route::post('login', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    Route::get('/', 'HomeController@index')->name('home');

    Route::group([
        'middleware' => ['auth', 'role:user', 'active']
    ], function () {
    	Route::group([
            'middleware' => ['role:user']
        ], function () {
            
        });
    });

});