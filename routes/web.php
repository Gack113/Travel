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
Route::get('/', 'PageController@redirect')->name('redirect');

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', 'DashBoardController@index')->name('dashboard');
});

Route::group(['middleware' => 'language', 'prefix' => 'en'], function() {
    Route::get('/', 'PageController@index')->name('HomeEn');
    Route::get('/{slug}', 'PageController@show')->name('show');
});

Route::group(['middleware' => 'language', 'prefix' => 'vn'], function() {
    Route::get('/', 'PageController@index')->name('Home');
    Route::get('/{slug}', 'PageController@show')->name('show');
});
