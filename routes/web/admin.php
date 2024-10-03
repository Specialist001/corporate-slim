<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OptionGroupsController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\PageCategoriesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ServiceCategoriesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UnitsController;

Route::group([
    'domain' => 'admin.'.config('app.domain'),
//    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    //Route::fallback('ErrorController@notFound')->name('404');

    Route::group([
        'namespace' => 'Auth',
        'as' => 'auth.'
    ], function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('loginForm');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::group([
        'middleware' => ['auth', 'role:admin', 'active']
    ], function () {
        Route::group([
            'middleware' => ['role:admin,manager']
        ], function () {
            Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager'], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

            Route::group([
                'prefix' => 'news',
                'as' => 'news.',
            ], function () {
                Route::get('', [NewsController::class, 'index'])->name('index');
                Route::get('create', [NewsController::class, 'create'])->name('create');
                Route::post('store', [NewsController::class, 'store'])->name('store');
                Route::get('edit/{news}', [NewsController::class, 'edit'])->name('edit');
                Route::put('update/{news}', [NewsController::class, 'update'])->name('update');
                Route::delete('destroy/{news}', [NewsController::class, 'destroy'])->name('destroy');
                Route::delete('image/{news?}', [NewsController::class, 'deleteImage'])->name('destroy.image');
            });

            Route::group([
                'prefix' => 'service-categories',
                'as' => 'service-categories.',
            ], function () {
                Route::get('', [ServiceCategoriesController::class,'index'])->name('index');
                Route::get('create', [ServiceCategoriesController::class,'create'])->name('create');
                Route::post('store', [ServiceCategoriesController::class,'store'])->name('store');
                Route::get('edit/{serviceCategory}', [ServiceCategoriesController::class,'edit'])->name('edit');
                Route::put('update/{serviceCategory}', [ServiceCategoriesController::class,'update'])->name('update');
                Route::delete('destroy/{serviceCategory}', [ServiceCategoriesController::class,'destroy'])->name('destroy');
                Route::delete('image/{serviceCategory?}', [ServiceCategoriesController::class,'deleteImage'])->name('destroy.image');
                Route::delete('icon/{serviceCategory?}', [ServiceCategoriesController::class,'deleteIcon'])->name('destroy.icon');
            });

            Route::group([
                'prefix' => 'services',
                'as' => 'services.',
            ], function () {
                Route::get('', [ServicesController::class, 'index'])->name('index');
                Route::get('create', [ServicesController::class, 'create'])->name('create');
                Route::post('store', [ServicesController::class, 'store'])->name('store');
                Route::get('edit/{service}', [ServicesController::class, 'edit'])->name('edit');
                Route::put('update/{service}', [ServicesController::class, 'update'])->name('update');
                Route::delete('destroy/{service}', [ServicesController::class, 'destroy'])->name('destroy');
                Route::delete('image/{service?}', [ServicesController::class, 'deleteImage'])->name('destroy.image');
                Route::delete('icon/{service?}', [ServicesController::class, 'deleteIcon'])->name('destroy.icon');
            });

            Route::group([
                'prefix' => 'page-categories',
                'as' => 'page-categories.',
            ], function () {
                Route::get('', [PageCategoriesController::class, 'index'])->name('index');
                Route::get('create', [PageCategoriesController::class, 'create'])->name('create');
                Route::post('store', [PageCategoriesController::class, 'store'])->name('store');
                Route::get('edit/{pageCategory}', [PageCategoriesController::class, 'edit'])->name('edit');
                Route::put('update/{pageCategory}', [PageCategoriesController::class, 'update'])->name('update');
                Route::delete('destroy/{pageCategory}', [PageCategoriesController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'pages',
                'as' => 'pages.',
            ], function () {
                Route::get('', [PagesController::class, 'index'])->name('index');
                Route::get('create', [PagesController::class, 'create'])->name('create');
                Route::post('store', [PagesController::class, 'store'])->name('store');
                Route::get('edit/{page}', [PagesController::class, 'edit'])->name('edit');
                Route::put('update/{page}', [PagesController::class, 'update'])->name('update');
                Route::delete('destroy/{page}', [PagesController::class, 'destroy'])->name('destroy');
                Route::delete('image/{page?}', [PagesController::class, 'deleteImage'])->name('destroy.image');
            });

            /* Shop */
            Route::group([
                'prefix' => 'brands',
                'as' => 'brands.',
            ], function () {
                Route::get('', [BrandsController::class, 'index'])->name('index');
                Route::get('create', [BrandsController::class, 'create'])->name('create');
                Route::post('store', [BrandsController::class, 'store'])->name('store');
                Route::get('edit/{brand}', [BrandsController::class, 'edit'])->name('edit');
                Route::put('update/{brand}', [BrandsController::class, 'update'])->name('update');
                Route::delete('destroy/{brand}', [BrandsController::class, 'destroy'])->name('destroy');
                Route::delete('logo/{brand?}', [BrandsController::class, 'deleteLogo'])->name('destroy.logo');
            });


            Route::group([
                'prefix' => 'units',
                'as' => 'units.',
            ], function () {
                Route::get('', [UnitsController::class, 'index'])->name('index');
                Route::get('create', [UnitsController::class, 'create'])->name('create');
                Route::post('store', [UnitsController::class, 'store'])->name('store');
                Route::get('edit/{unit}', [UnitsController::class, 'edit'])->name('edit');
                Route::put('update/{unit}', [UnitsController::class, 'update'])->name('update');
                Route::delete('destroy/{unit}', [UnitsController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'option-groups',
                'as' => 'option-groups.',
            ], function () {
                Route::get('', [OptionGroupsController::class, 'index'])->name('index');
                Route::get('create', [OptionGroupsController::class, 'create'])->name('create');
                Route::post('store', [OptionGroupsController::class, 'store'])->name('store');
                Route::get('edit/{optionGroup}', [OptionGroupsController::class, 'edit'])->name('edit');
                Route::put('update/{optionGroup}', [OptionGroupsController::class, 'update'])->name('update');
                Route::delete('destroy/{optionGroup}', [OptionGroupsController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'options',
                'as' => 'options.',
            ], function () {
                Route::get('', [OptionsController::class, 'index'])->name('index');
                Route::get('create', [OptionsController::class, 'create'])->name('create');
                Route::post('store', [OptionsController::class, 'store'])->name('store');
                Route::get('edit/{option}', [OptionsController::class, 'edit'])->name('edit');
                Route::put('update/{option}', [OptionsController::class, 'update'])->name('update');
                Route::delete('destroy/{option}', [OptionsController::class, 'destroy'])->name('destroy');

                Route::get('getOptionValue/{optionValue}', [OptionsController::class, 'getOptionValue'])->name('getOptionValue');
                Route::get('createOptionValue/{option}', [OptionsController::class, 'createOptionValue'])->name('createOptionValue');
                Route::post('addOptionValue', [OptionsController::class, 'addOptionValue'])->name('addOptionValue');
                Route::post('updateOptionValue', [OptionsController::class, 'updateOptionValue'])->name('updateOptionValue');
                Route::delete('deleteOptionValue/{optionValue}', [OptionsController::class, 'deleteOptionValue'])->name('deleteOptionValue');
            });

            Route::group([
                'prefix' => 'product-categories',
                'as' => 'product-categories.',
            ], function () {
                Route::get('', [ProductCategoriesController::class, 'index'])->name('index');
                Route::get('create', [ProductCategoriesController::class, 'create'])->name('create');
                Route::post('store', [ProductCategoriesController::class, 'store'])->name('store');
                Route::get('edit/{productCategory}', [ProductCategoriesController::class, 'edit'])->name('edit');
                Route::put('update/{productCategory}', [ProductCategoriesController::class, 'update'])->name('update');
                Route::delete('destroy/{productCategory}', [ProductCategoriesController::class, 'destroy'])->name('destroy');
                Route::delete('image/{productCategory?}', [ProductCategoriesController::class, 'deleteImage'])->name('destroy.image');
                Route::delete('icon/{productCategory?}', [ProductCategoriesController::class, 'deleteIcon'])->name('destroy.icon');
            });

            Route::group([
                'prefix' => 'products',
                'as' => 'products.',
            ], function () {
                Route::get('', [ProductsController::class, 'index'])->name('index');
                Route::get('create', [ProductsController::class, 'create'])->name('create');
                Route::post('store', [ProductsController::class, 'store'])->name('store');
                Route::get('edit/{product}', [ProductsController::class, 'edit'])->name('edit');
                Route::put('update/{product}', [ProductsController::class, 'update'])->name('update');
                Route::delete('destroy/{product}', [ProductsController::class, 'destroy'])->name('destroy');
                Route::delete('image/{product?}', [ProductsController::class, 'deleteImage'])->name('destroy.image');
            });
        });

        //Route::get('', 'HomeController@index')->name('home');

        Route::group([
            'middleware' => ['role:admin']
        ], function () {

        });
    });
});
