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

    Route::resource('tours', 'TourController');
    Route::resource('bookings', 'BookingController');

});

Route::group(['middleware' => 'language', 'prefix' => 'en'], function() {
    Route::get('/', 'PageController@index')->name('HomeEn');
    Route::get('/{slug}', 'PageController@show')->name('show');
    Route::get('/test/1', 'PageController@test')->name('test');
});

Route::group(['middleware' => 'language', 'prefix' => 'vn'], function() {
    Route::get('/', 'PageController@index')->name('Home');
    Route::get('/{slug}', 'PageController@show')->name('show');
});
