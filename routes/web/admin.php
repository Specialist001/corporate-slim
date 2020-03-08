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
        Route::group([
            'middleware' => ['role:admin,manager']
        ], function () {
            Route::get('/', 'HomeController@index')->name('home');

            Route::group([
                'prefix' => 'news',
                'as' => 'news.',
            ], function () {
                Route::get('', 'NewsController@index')->name('index');
                Route::get('create', 'NewsController@create')->name('create');
                Route::post('store', 'NewsController@store')->name('store');
                Route::get('edit/{news}', 'NewsController@edit')->name('edit');
                Route::put('update/{news}', 'NewsController@update')->name('update');
                Route::delete('destroy/{news}', 'NewsController@destroy')->name('destroy');
                Route::delete('image/{news?}', 'NewsController@deleteImage')->name('destroy.image');
            });

            Route::group([
                'prefix' => 'service-category',
                'as' => 'service-category.',
            ], function () {
                Route::get('', 'ServiceCategoryController@index')->name('index');
                Route::get('create', 'ServiceCategoryController@create')->name('create');
                Route::post('store', 'ServiceCategoryController@store')->name('store');
                Route::get('edit/{serviceCategory}', 'ServiceCategoryController@edit')->name('edit');
                Route::put('update/{serviceCategory}', 'ServiceCategoryController@update')->name('update');
                Route::delete('destroy/{serviceCategory}', 'ServiceCategoryController@destroy')->name('destroy');
                Route::delete('image/{serviceCategory?}', 'ServiceCategoryController@deleteImage')->name('destroy.image');
                Route::delete('icon/{serviceCategory?}', 'ServiceCategoryController@deleteIcon')->name('destroy.icon');
            });
        });

        //Route::get('', 'HomeController@index')->name('home');

        Route::group([
            'middleware' => ['role:admin']
        ], function () {

        });
    });
});
