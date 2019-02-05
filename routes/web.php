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
    });
//});
