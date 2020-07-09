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
                Route::delete('icon/{serviceCategory?}', 'ServiceCategoriesController@deleteIcon')->name('destroy.icon');
            });

            Route::group([
                'prefix' => 'services',
                'as' => 'services.',
            ], function () {
                Route::get('', 'ServicesController@index')->name('index');
                Route::get('create', 'ServicesController@create')->name('create');
                Route::post('store', 'ServicesController@store')->name('store');
                Route::get('edit/{service}', 'ServicesController@edit')->name('edit');
                Route::put('update/{service}', 'ServicesController@update')->name('update');
                Route::delete('destroy/{service}', 'ServicesController@destroy')->name('destroy');
                Route::delete('image/{service?}', 'ServicesController@deleteImage')->name('destroy.image');
                Route::delete('icon/{service?}', 'ServicesController@deleteIcon')->name('destroy.icon');
            });

            Route::group([
                'prefix' => 'page-categories',
                'as' => 'page-categories.',
            ], function () {
                Route::get('', 'PageCategoriesController@index')->name('index');
                Route::get('create', 'PageCategoriesController@create')->name('create');
                Route::post('store', 'PageCategoriesController@store')->name('store');
                Route::get('edit/{pageCategory}', 'PageCategoriesController@edit')->name('edit');
                Route::put('update/{pageCategory}', 'PageCategoriesController@update')->name('update');
                Route::delete('destroy/{pageCategory}', 'PageCategoriesController@destroy')->name('destroy');
            });

            Route::group([
                'prefix' => 'pages',
                'as' => 'pages.',
            ], function () {
                Route::get('', 'PagesController@index')->name('index');
                Route::get('create', 'PagesController@create')->name('create');
                Route::post('store', 'PagesController@store')->name('store');
                Route::get('edit/{page}', 'PagesController@edit')->name('edit');
                Route::put('update/{page}', 'PagesController@update')->name('update');
                Route::delete('destroy/{page}', 'PagesController@destroy')->name('destroy');
                Route::delete('image/{page?}', 'PagesController@deleteImage')->name('destroy.image');
            });

            Route::group([
                'prefix' => 'option-groups',
                'as' => 'option-groups.',
            ], function () {
                Route::get('', 'OptionGroupsController@index')->name('index');
                Route::get('create', 'OptionGroupsController@create')->name('create');
                Route::post('store', 'OptionGroupsController@store')->name('store');
                Route::get('edit/{optionGroup}', 'OptionGroupsController@edit')->name('edit');
                Route::put('update/{optionGroup}', 'OptionGroupsController@update')->name('update');
                Route::delete('destroy/{optionGroup}', 'OptionGroupsController@destroy')->name('destroy');
            });

            Route::group([
                'prefix' => 'options',
                'as' => 'options.',
            ], function () {
                Route::get('', 'OptionsController@index')->name('index');
                Route::get('create', 'OptionsController@create')->name('create');
                Route::post('store', 'OptionsController@store')->name('store');
                Route::get('edit/{option}', 'OptionsController@edit')->name('edit');
                Route::put('update/{option}', 'OptionsController@update')->name('update');
                Route::delete('destroy/{option}', 'OptionsController@destroy')->name('destroy');

                Route::get('getOptionValue/{optionValue}', 'OptionsController@getOptionValue')->name('getOptionValue');
                Route::post('setOptionValue', 'OptionsController@setOptionValue')->name('setOptionValue');
                Route::post('putOptionValue', 'OptionsController@putOptionValue')->name('putOptionValue');
            });
        });

        //Route::get('', 'HomeController@index')->name('home');

        Route::group([
            'middleware' => ['role:admin']
        ], function () {

        });
    });
});
