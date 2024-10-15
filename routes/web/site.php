<?php

use App\Http\Controllers\Site\ErrorController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ServiceCategoriesController;

Route::group([
    'domain' => config('app.domain'),
    'namespace' => 'Site',
    'as' => 'site.'
], function () {
    Route::fallback([ErrorController::class, 'notFound'])->name('404');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('services/{slug}', [ServiceCategoriesController::class, 'show'])->name('services.show');

    Route::group([
        'prefix' => 'news',
        'as' => 'news.',
    ], function () {
        Route::get('', [NewsController::class, 'index'])->name('index');
        Route::get('{slug}', [NewsController::class,'show'])->name('show');
//        Route::get('create', 'NewsController@create')->name('create');
//        Route::post('store', 'NewsController@store')->name('store');
//        Route::put('update/{news}', 'NewsController@update')->name('update');
//        Route::delete('destroy/{news}', 'NewsController@destroy')->name('destroy');
//        Route::delete('image/{news?}', 'NewsController@deleteImage')->name('destroy.image');
    });

});
