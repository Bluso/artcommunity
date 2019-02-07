<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::middleware(['auth'])->group(function () {
    Route::prefix('backend')->group(function () {
        Route::get('/', 'Backend\HomeController@index');
        Route::prefix('banner')->group(function () {
            Route::get('/', 'Backend\BannerController@index');
            Route::get('add', 'Backend\BannerController@add');
            Route::post('add', 'Backend\BannerController@store');
            Route::get('edit/{id}', 'Backend\BannerController@edit');
            Route::post('edit', 'Backend\BannerController@storeedit');
            Route::get('delete/{id}', 'Backend\BannerController@destroy');
        });
        Route::prefix('news')->group(function () {
            Route::post('upload/image', 'Backend\NewsActivityController@upload_image');
            Route::get('/', 'Backend\NewsActivityController@index');
            Route::get('add', 'Backend\NewsActivityController@create');
            Route::post('add', 'Backend\NewsActivityController@store');
            Route::get('edit/{id}', 'Backend\NewsActivityController@edit');
            Route::post('edit/{id}', 'Backend\NewsActivityController@update');
            Route::get('delete/{id}', 'Backend\NewsActivityController@destroy');
            Route::prefix('cate')->group(function () {
                Route::post('upload/image', 'Backend\CateNewsActivityController@upload_image');
                Route::get('/', 'Backend\CateNewsActivityController@index');
                Route::get('add', 'Backend\CateNewsActivityController@create');
                Route::post('add', 'Backend\CateNewsActivityController@store');
                Route::get('edit/{id}', 'Backend\CateNewsActivityController@edit');
                Route::post('edit/{id}', 'Backend\CateNewsActivityController@update');
                Route::get('delete/{id}', 'Backend\CateNewsActivityController@destroy');
            });
            
        });
    });
//});
