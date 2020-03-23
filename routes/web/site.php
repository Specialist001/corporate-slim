<?php

Route::group([
    'domain' => config('app.domain'),
    'namespace' => 'Site',
    'as' => 'site.'
], function () {
    Route::fallback('ErrorController@notFound')->name('404');

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('services/{slug}', 'ServiceCategoriesController@show')->name('services.show');

});
