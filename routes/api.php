<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    //'middleware' => ['localize', 'localizationRedirect'],
    'domain' => 'api.'.config('app.domain'),
    'namespace' => 'Api',
    'as' => 'api.',
    // 'prefix' => 'api', 
], function (){
 //    Route::group([
	// ], function () {
		
		// Route::get('news', 'NewsController@index')->name('news');
		
		Route::group([
            'prefix' => 'news',
            'as' => 'news.',
        ], function () {
			Route::get('index', 'NewsController@index')->name('index');
            Route::post('store', 'NewsController@store')->name('store');
        	// Route::resource('index', 'NewsController', ['except' => ['create', 'edit']]);
            
            // Route::get('truck-types', 'HandbookController@carTypes')->name('truck-types');
            // Route::get('cargo-types', 'HandbookController@cargoTypes')->name('cargo-types');
            // Route::get('load-types', 'HandbookController@loadTypes')->name('load-types');
            // Route::get('categories', 'HandbookController@categories')->name('categories');
            // Route::get('categoriesall', 'HandbookController@categoriesall')->name('categoriesall');
            // Route::get('companies', 'HandbookController@companies')->name('companies');
        // });
		
		// Route::get('create', 'NewsController@create')->name('create');
		// Route::post('store', 'NewsController@store')->name('store');
		});
	// });
});
