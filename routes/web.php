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

Route::group(['middleware' => 'isActive'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/services', 'ServiceController');

    Route::resource('/users', 'UserController');

    Route::get('/users/{id}/services', 'UserController@userServicesIndex')->name('users.services.index');
    Route::get('/users/{id}/services/{service}', 'UserController@userServicesShow')->name('users.services.show');
    Route::patch('/users/{id}/services/{service}', 'UserController@userServicesEdit')->name('users.services.edit');
    Route::delete('/users/{id}/services/{service}', 'UserController@userServicesDestroy')->name('users.services.destroy');
});