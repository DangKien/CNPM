<?php

namespace App\Http\Controllers\FrontEnd\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;


Class ViewCateCtrl extends Controller {

    public function getViewCate ($cate, CateModel $cateModel) {
    	$cateId = $cateModel::select('id', 'slug', 'name')
    							->where('slug', $cate)
    							->first();	
        if (empty($cateId)) {
            return view('errors.404');
        }			
    	$menu   = $cateModel::select('id', 'slug', 'name')
    						  ->where('cate_id', $cateId->id)
    						  ->get();
        $url    = request()->path();
       	
        switch ($url) {
            case 'lien-he':
                return view('front.content.contact.contact', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case 'thong-bao':
                return view('front.content.list', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case 'tin-tuc':
                return view('front.content.list', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            default:
                 return view('front.content.cate', ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
        }
    }

     public function getDetail ($cate, $slug, CateModel $cateModel) {
        $cateId = $cateModel::select('id', 'slug', 'name')
                                ->where('slug', $cate)
                                ->first(); 
        if (empty($cateId)) {
            return view('errors.404',[], 404);
        }                
        $menu   = $cateModel::select('id', 'slug', 'name')
                              ->where('cate_id', $cateId->id)
                              ->get();

        $url    = request()->path();
        
        switch ($url) {
            case 'tuyen-sinh/dang-ki-online':
                return view('front.content.addmission.addmission', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case 'thu-vien/thu-vien-anh':
                return view('front.content.album.albumTitle', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case 'thu-vien/thu-vien-tai-lieu':
                return view('front.content.file.file', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case 'thong-bao':
                return view('front.content.list', ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
             case 'gioi-thieu/gioi-thieu-chung':
                return view('front.content.introduce.introduce', ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;

            default:
                 return view('front.content.cate', ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
        }
    }

     public function getDetailId($cate, $slug, $id, CateModel $cateModel){
        $cateId = $cateModel::select('id', 'slug', 'name')
                                ->where('slug', $cate)
                                ->first();        
        $menu   = $cateModel::select('id', 'slug', 'name')
                              ->where('cate_id', $cateId->id)
                              ->get();
        $url    = request()->path();
        
        return view('front.content.cate', ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu, 'idNews'=>$id]);
    }
    
}
