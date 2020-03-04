<?php

Route::group([
    'domain' => 'admin.'.config('app.domain'),
    'namespace' => 'Admin',
    'as' => 'admin.'
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

    Route::group([
        'middleware' => ['auth', 'role:admin', 'active']
    ], function () {
        Route::get('', 'HomeController@index')->name('home');
    });
});
