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

Route::group(['prefix' => ''], function (){
    Route::get('/', 'View\ViewController@user');
    Route::get('/user', 'View\ViewController@user')->name('user');
    Route::get('/slide', 'View\ViewController@slide')->name('slide');
    Route::get('/cate-new', 'View\ViewController@cateNew')->name('cate-new');
    Route::get('/new', 'View\ViewController@new')->name('new');
    Route::get('/dishes', 'View\ViewController@dishes')->name('dishes');
    Route::get('/menu', 'View\ViewController@menu')->name('menu');
    Route::get('/addmission', 'View\ViewController@addmission')->name('addmission');
    Route::get('/class', 'View\ViewController@class')->name('class');

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


    Route::get('/dishes', 'Rest\DishesController@getList');
    Route::post('/dishes', 'Rest\DishesController@getInsert');
    Route::get('/dishes/{id}', 'Rest\DishesController@getEdit');
    Route::put('/dishes/{id}', 'Rest\DishesController@getUpdate');
    Route::delete('/dishes/{id}', 'Rest\DishesController@getDelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
