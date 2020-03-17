<?php

Route::group([
    'domain' => 'admin.'.config('app.domain'),
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    //Route::fallback('ErrorController@notFound')->name('404');

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
                'prefix' => 'service-categories',
                'as' => 'service-categories.',
            ], function () {
                Route::get('', 'ServiceCategoriesController@index')->name('index');
                Route::get('create', 'ServiceCategoriesController@create')->name('create');
                Route::post('store', 'ServiceCategoriesController@store')->name('store');
                Route::get('edit/{serviceCategory}', 'ServiceCategoriesController@edit')->name('edit');
                Route::put('update/{serviceCategory}', 'ServiceCategoriesController@update')->name('update');
                Route::delete('destroy/{serviceCategory}', 'ServiceCategoriesController@destroy')->name('destroy');
                Route::delete('image/{serviceCategory?}', 'ServiceCategoriesController@deleteImage')->name('destroy.image');
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
