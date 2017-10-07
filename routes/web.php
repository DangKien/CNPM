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

Route::group(['prefix' => 'rest'], function() {

	Route::get('/user', 'Rest\UserController@getList');
    Route::post('/user', 'Rest\UserController@getInsert');
    Route::get('/user/{id}', 'Rest\UserController@getEdit');
	Route::put('/user/{id}', 'Rest\UserController@getUpdate');
	Route::delete('/user/{id}', 'Rest\UserController@getDelete');

    Route::get('/new', 'Rest\NewController@getList');
    Route::post('/new', 'Rest\NewController@getInsert');
    Route::get('/new/{id}', 'Rest\NewController@getEdit');
	Route::put('/new/{id}', 'Rest\NewController@getUpdate');
	Route::delete('/new/{id}', 'Rest\NewController@getDelete');


    Route::get('/slide', 'Rest\SlideController@getList');
    Route::post('/slide', 'Rest\SlideController@getInsert');
    Route::get('/slide/{id}', 'Rest\SlideController@getEdit');
	Route::put('/slide/{id}', 'Rest\SlideController@getUpdate');
	Route::delete('/slide/{id}', 'Rest\SlideController@getDelete');



    Route::get('/cate', 'Rest\CateController@getList');
    Route::post('/cate', 'Rest\CateController@getInsert');
    Route::get('/cate/{id}', 'Rest\CateController@getEdit');
	Route::put('/cate/{id}', 'Rest\CateController@getUpdate');
	Route::delete('/cate/{id}', 'Rest\CateController@getDelete');



    Route::get('/class', 'Rest\ClassController@getList');
    Route::post('/class', 'Rest\ClassController@getInsert');
    Route::get('/class/{id}', 'Rest\ClassController@getEdit');
    Route::put('/class/{id}', 'Rest\ClassController@getUpdate');
    Route::delete('/class/{id}', 'Rest\ClassController@getDelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
