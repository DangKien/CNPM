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
Route::get('download/file/{idFile}',"FrontEnd\Download\FileCtrl@getDownload");
Route::get('/modal/{view}', 'BackEnd\View\ViewController@modal')->middleware('loginback');

Route::get('/modal/frontend/{view}', 'FrontEnd\Modal\ModalCtrl@modal');

Route::get('download/file/{idFile}',"FrontEnd\Download\FileCtrl@getDownload");

Route::get('backend/view/login', 'BackEnd\Login\LoginController@login')->name('getLogin');
Route::post('backend/view/login', 'BackEnd\Login\LoginController@postlogin')->name('login');
Route::get('backend/view/logout', 'Auth\LoginController@logout')->name('logout');

// backend view
Route::group(['prefix' => 'backend', 'middleware'=>'loginback'], function (){
    Route::group(['prefix' => 'view'], function (){
        Route::get('/', 'BackEnd\View\ViewController@user');
        Route::get('/user', 'BackEnd\View\ViewController@user')->name('user');
        Route::get('/slide', 'BackEnd\View\ViewController@slide')->name('slide');
        Route::get('/cate-new', 'BackEnd\View\ViewController@cateNew')->name('cate-new');
        Route::get('/new', 'BackEnd\View\ViewController@new')->name('new');
        Route::get('/menu', 'BackEnd\View\ViewController@menu')->name('menu');
        Route::get('/addmission', 'BackEnd\View\ViewController@addmission')->name('addmission');
        Route::get('/class', 'BackEnd\View\ViewController@class')->name('class');
        Route::get('/file-image', 'BackEnd\View\ViewController@fileImage')->name('file-image');
        Route::get('/file-video', 'BackEnd\View\ViewController@fileVideo')->name('file-video');
        Route::get('/file-music', 'BackEnd\View\ViewController@fileMusic')->name('file-music');
        Route::get('/file', 'BackEnd\View\ViewController@file')->name('file');
        Route::get('/event', 'BackEnd\View\ViewController@event')->name('event');
        Route::get('/fileAlbum', function(){
            return view('back.content.libary.image.albumImage');
         })->name('fileAlbum');
        Route::get('/album', function(){
            return view('back.content.libary.image.image');
         });
    });
});
// fontendview
Route::group(['prefix' => ''], function (){
    Route::get('', function () {
        return view('front.content.home');
    })->name('home');
    // Route::get('gioi-thieu', 'FrontEnd\View\IntroduceCtrl@getIntroduce')->name('home');
    Route::get('/{cate}',"FrontEnd\View\ViewCateCtrl@getViewCate");
    Route::get('/{cate}/{slug}',"FrontEnd\View\ViewCateCtrl@getDetail");
    Route::get('/{cate}/{slug}/post-{idNew}',"FrontEnd\View\ViewCateCtrl@getDetailId");
    Route::get('/{cate}/{slug}/album-{idNew}',"FrontEnd\View\ViewImageCtrl@getDetailImage");
    Route::get('/{cate}/{slug}/thuc-don-cho-be-{idNew}',"FrontEnd\View\ViewMenuCtrl@getDetailMenu");
});


//backend
Route::group(['prefix' => 'rest/backend', 'middleware'=>'loginback'], function() {

    // người dùng
	Route::get('/user', 'BackEnd\Rest\UserController@getList');
    Route::post('/user', 'BackEnd\Rest\UserController@getInsert');
    Route::get('/user/{id}', 'BackEnd\Rest\UserController@getEdit');
	Route::post('/user-update/{id}', 'BackEnd\Rest\UserController@getUpdate');
	Route::delete('/user/{id}', 'BackEnd\Rest\UserController@getDelete');

    // Tin tức mới
    Route::get('/new', 'BackEnd\Rest\NewController@getList');
    Route::post('/new', 'BackEnd\Rest\NewController@getInsert');
    Route::get('/new/{id}', 'BackEnd\Rest\NewController@getEdit');
	Route::post('/new/{id}', 'BackEnd\Rest\NewController@getUpdate');
	Route::delete('/new/{id}', 'BackEnd\Rest\NewController@getDelete');

    // slide image 
    Route::get('/slide', 'BackEnd\Rest\SlideController@getList');
    Route::post('/slide', 'BackEnd\Rest\SlideController@getInsert');
    Route::get('/slide/{id}', 'BackEnd\Rest\SlideController@getEdit');
	Route::post('/slide/{id}', 'BackEnd\Rest\SlideController@getUpdate');
	Route::delete('/slide/{id}', 'BackEnd\Rest\SlideController@getDelete');


    // loại tin
    Route::get('/cate', 'BackEnd\Rest\CateController@getList');
    Route::post('/cate', 'BackEnd\Rest\CateController@getInsert');
    Route::get('/cate/{id}', 'BackEnd\Rest\CateController@getEdit');
	Route::put('/cate/{id}', 'BackEnd\Rest\CateController@getUpdate');
	Route::delete('/cate/{id}', 'BackEnd\Rest\CateController@getDelete');


    // lớp học
    Route::get('/class', 'BackEnd\Rest\ClassController@getList');
    Route::post('/class', 'BackEnd\Rest\ClassController@getInsert');
    Route::get('/class/{id}', 'BackEnd\Rest\ClassController@getEdit');
    Route::put('/class/{id}', 'BackEnd\Rest\ClassController@getUpdate');
    Route::delete('/class/{id}', 'BackEnd\Rest\ClassController@getDelete');

    //them mon
    Route::get('/cate-menu', 'BackEnd\Rest\MenuController@getListCateMenu');
    Route::get('/menu', 'BackEnd\Rest\MenuController@getList');
    Route::post('/menu', 'BackEnd\Rest\MenuController@getInsert');
    Route::get('/menu/{id}', 'BackEnd\Rest\MenuController@getEdit');
    Route::post('/menu/{id}', 'BackEnd\Rest\MenuController@getUpdate');
    Route::delete('/menu/{id}', 'BackEnd\Rest\MenuController@getDelete');


    // album ảnh
    Route::get('/album', 'BackEnd\Rest\AlbumController@getList');
    Route::post('/album', 'BackEnd\Rest\AlbumController@getInsert');
    Route::get('/album/{id}', 'BackEnd\Rest\AlbumController@getEdit');
    Route::post('/album/{id}', 'BackEnd\Rest\AlbumController@getUpdate');
    Route::delete('/album/{id}', 'BackEnd\Rest\AlbumController@getDelete');

    // ảnh trong album
    Route::get('/image', 'BackEnd\Rest\FileImgController@getList');
    Route::post('/image', 'BackEnd\Rest\FileImgController@getInsert');
    Route::get('/image/{id}', 'BackEnd\Rest\FileImgController@getEdit');
    Route::post('/image/{id}', 'BackEnd\Rest\FileImgController@getUpdate');
    Route::delete('/image/{id}', 'BackEnd\Rest\FileImgController@getDelete');

    // tài liệu
    Route::get('/file', 'BackEnd\Rest\UploadFileController@getList');
    Route::post('/file', 'BackEnd\Rest\UploadFileController@getInsert');
    Route::get('/file/{id}', 'BackEnd\Rest\UploadFileController@getEdit');
    Route::post('/file/{id}', 'BackEnd\Rest\UploadFileController@getUpdate');
    Route::delete('/file/{id}', 'BackEnd\Rest\UploadFileController@getDelete');

    // video
    Route::get('/video', 'BackEnd\Rest\VideoController@getList');
    Route::post('/video', 'BackEnd\Rest\VideoController@getInsert');
    Route::get('/video/{id}', 'BackEnd\Rest\VideoController@getEdit');
    Route::post('/video/{id}', 'BackEnd\Rest\VideoController@getUpdate');
    Route::delete('/video/{id}', 'BackEnd\Rest\VideoController@getDelete');

    // su kien
    Route::get('/event', 'BackEnd\Rest\EventController@getList');
    Route::post('/event', 'BackEnd\Rest\EventController@getInsert');
    Route::get('/event/{id}', 'BackEnd\Rest\EventController@getEdit');
    Route::post('/event/{id}', 'BackEnd\Rest\EventController@getUpdate');
    Route::delete('/event/{id}', 'BackEnd\Rest\EventController@getDelete');

    Route::get('/addmission', 'BackEnd\Rest\AddMissionController@getList');
    Route::get('/addmission/{id}', 'BackEnd\Rest\AddMissionController@getCheck');

    Route::get('/contact', 'BackEnd\Rest\AddMissionController@getContact');

});

Route::group(['prefix' => 'rest'], function (){
    Route::group(['prefix' => 'fontend'], function (){
        Route::get('/mainMenu', 'FrontEnd\Rest\HomeCtrl@getMainMenu'); //menu

        Route::get('/sidler', 'FrontEnd\Rest\HomeCtrl@getSlider'); // slide anh home

        Route::get('/libImage', 'FrontEnd\Rest\HomeCtrl@getLibImage'); // imgae cuoi trang home
        Route::get('/album', 'FrontEnd\Rest\ImageCtrl@getAlbumImage'); //danh sach album anh
        Route::get('/image-album/{idAlbum}', 'FrontEnd\Rest\ImageCtrl@getImage'); //lay anh trong album
        Route::get('/album-name/{idAlbum}', 'FrontEnd\Rest\ImageCtrl@getAlbum'); //danh sach album anh

        Route::get('/file', 'FrontEnd\Rest\FileCtrl@getFile');// lay file

        Route::get('/event', 'FrontEnd\Rest\EventCtrl@getEvent');
        Route::get('/event/{id}', 'FrontEnd\Rest\EventCtrl@oneEvent');

        Route::get('/news/{slugNew}', 'FrontEnd\Rest\HomeCtrl@getNews'); //tin tuc
        Route::get('/news-deltail/{idNew}', 'FrontEnd\Rest\CateNewCtrl@getDetailNews'); // chi tiet tin tuc
        Route::get('/one-news/{cate}/{slugNew}', 'FrontEnd\Rest\CateNewCtrl@getOnePost');// chi tiet tin 1 cate
        Route::get('/ds-tin-tuc/{slugNew}', 'FrontEnd\Rest\ListPostCtrl@getListPost');// danh sach tin tuc
        Route::get('/ds-tin-tuc/{slugNew}/{slugDetail}', 'FrontEnd\Rest\ListPostCtrl@getPost');

        Route::post('/contact', 'FrontEnd\Rest\ContactCtrl@getContact');

        Route::post('/addmission', 'FrontEnd\Rest\AddmissionCtrl@getAddmission');

        Route::get('/listMenu', 'FrontEnd\Rest\MenuCtrl@getList');
        Route::get('/detailMenu', 'FrontEnd\Rest\MenuCtrl@getDetail');
    });
});

Route::group(['prefix' => config('youtube.routes.prefix')], function() {
/**
 * Authentication
 **/
    Route::get(config('youtube.routes.authentication_uri'), function()
    {
        return redirect()->to(Youtube::createAuthUrl());
    })->name('registerYoutube');
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