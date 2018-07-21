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

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashBoardController@index')->name('dashboard');

    Route::resource('tours', 'TourController');
    Route::resource('bookings', 'BookingController');
    Route::resource('customers', 'CustomerController');
    Route::resource('users', 'UserController');
    Route::resource('services', 'ServiceController');

});

Route::get('change-language/{locale}', 'PageController@changeLocale')->name('change-locale');
Route::group(['middleware' => 'language'], function() {
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/{slug}', 'PageController@show')->name('show');
    Route::get('/tour/list', 'PageController@listTours')->name('tour-list');
    Route::get('/{slug}/book', 'PageController@book')->name('book');
    Route::post('/{slug}/book', 'PageController@postBook')->name('postBook');
});
