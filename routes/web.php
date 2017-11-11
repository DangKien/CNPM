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

Route::get('/modal/{view}', 'View\ViewController@modal');

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
    Route::get('/file-image', 'View\ViewController@fileImage')->name('file-image');
    Route::get('/file-video', 'View\ViewController@fileVideo')->name('file-video');
    Route::get('/file-music', 'View\ViewController@fileMusic')->name('file-music');
    Route::get('/file', 'View\ViewController@file')->name('file');
    Route::get('/fileAlbum', function(){
        return view('back.content.libary.image.albumImage');
     })->name('fileAlbum');
    Route::get('/album', function(){
        return view('back.content.libary.image.image');
     });
    // youtube
    Route::group(['prefix' => config('youtube.routes.prefix')], function() {
        /**
         * Authentication
         */
        Route::get(config('youtube.routes.authentication_uri'), function()
        {
            return redirect()->to(Youtube::createAuthUrl());
        });

        /**
         * Redirect
         */
        Route::get(config('youtube.routes.redirect_uri'), function(Illuminate\Http\Request $request)
        {
            if(!$request->has('code')) {
                throw new Exception('$_GET[\'code\'] is not set. Please re-authenticate.');
            }

            $token = Youtube::authenticate($request->get('code'));

            Youtube::saveAccessTokenToDB($token);

            return redirect(config('youtube.routes.redirect_back_uri', '/'));
        });

    });

});


Route::group(['prefix' => 'rest'], function() {

    // người dùng
	Route::get('/user', 'Rest\Backend\UserController@getList');
    Route::post('/user', 'Rest\Backend\UserController@getInsert');
    Route::get('/user/{id}', 'Rest\Backend\UserController@getEdit');
	Route::post('/user-update/{id}', 'Rest\Backend\UserController@getUpdate');
	Route::delete('/user/{id}', 'Rest\Backend\UserController@getDelete');

    // Tin tức mới
    Route::get('/new', 'Rest\Backend\NewController@getList');
    Route::post('/new', 'Rest\Backend\NewController@getInsert');
    Route::get('/new/{id}', 'Rest\Backend\NewController@getEdit');
	Route::post('/new/{id}', 'Rest\Backend\NewController@getUpdate');
	Route::delete('/new/{id}', 'Rest\Backend\NewController@getDelete');

    // slide image 
    Route::get('/slide', 'Rest\Backend\SlideController@getList');
    Route::post('/slide', 'Rest\Backend\SlideController@getInsert');
    Route::get('/slide/{id}', 'Rest\Backend\SlideController@getEdit');
	Route::post('/slide/{id}', 'Rest\Backend\SlideController@getUpdate');
	Route::delete('/slide/{id}', 'Rest\Backend\SlideController@getDelete');


    // loại tin
    Route::get('/cate', 'Rest\Backend\CateController@getList');
    Route::post('/cate', 'Rest\Backend\CateController@getInsert');
    Route::get('/cate/{id}', 'Rest\Backend\CateController@getEdit');
	Route::put('/cate/{id}', 'Rest\Backend\CateController@getUpdate');
	Route::delete('/cate/{id}', 'Rest\Backend\CateController@getDelete');


    // lớp học
    Route::get('/class', 'Rest\Backend\ClassController@getList');
    Route::post('/class', 'Rest\Backend\ClassController@getInsert');
    Route::get('/class/{id}', 'Rest\Backend\ClassController@getEdit');
    Route::put('/class/{id}', 'Rest\Backend\ClassController@getUpdate');
    Route::delete('/class/{id}', 'Rest\Backend\ClassController@getDelete');

    //them mon
    Route::get('/dishes', 'Rest\Backend\DishesController@getList');
    Route::post('/dishes', 'Rest\Backend\DishesController@getInsert');
    Route::get('/dishes/{id}', 'Rest\Backend\DishesController@getEdit');
    Route::put('/dishes/{id}', 'Rest\Backend\DishesController@getUpdate');
    Route::delete('/dishes/{id}', 'Rest\Backend\DishesController@getDelete');


    // album ảnh
    Route::get('/album', 'Rest\Backend\AlbumController@getList');
    Route::post('/album', 'Rest\Backend\AlbumController@getInsert');
    Route::get('/album/{id}', 'Rest\Backend\AlbumController@getEdit');
    Route::post('/album/{id}', 'Rest\Backend\AlbumController@getUpdate');
    Route::delete('/album/{id}', 'Rest\Backend\AlbumController@getDelete');

    // ảnh trong album
    Route::get('/image', 'Rest\Backend\FileImgController@getList');
    Route::post('/image', 'Rest\Backend\FileImgController@getInsert');
    Route::get('/image/{id}', 'Rest\Backend\FileImgController@getEdit');
    Route::post('/image/{id}', 'Rest\Backend\FileImgController@getUpdate');
    Route::delete('/image/{id}', 'Rest\Backend\FileImgController@getDelete');

    // tài liệu
    Route::get('/file', 'Rest\Backend\UploadFileController@getList');
    Route::post('/file', 'Rest\Backend\UploadFileController@getInsert');
    Route::get('/file/{id}', 'Rest\Backend\UploadFileController@getEdit');
    Route::post('/file/{id}', 'Rest\Backend\UploadFileController@getUpdate');
    Route::delete('/file/{id}', 'Rest\Backend\UploadFileController@getDelete');

    // video
    Route::get('/video', 'Rest\Backend\VideoController@getList');
    Route::post('/video', 'Rest\Backend\VideoController@getInsert');
    Route::get('/video/{id}', 'Rest\Backend\VideoController@getEdit');
    Route::post('/video/{id}', 'Rest\Backend\VideoController@getUpdate');
    Route::delete('/video/{id}', 'Rest\Backend\VideoController@getDelete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

