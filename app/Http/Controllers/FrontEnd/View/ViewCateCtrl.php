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
            case config('viewCate.lien-he.url'):
                return view(config('viewCate.lien-he.view'),
                            ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.thong-bao.url'):
                return view(config('viewCate.thong-bao.view'), 
                            ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.tin-tuc.url'):
                return view(config('viewCate.tin-tuc.view'), 
                            ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.chuong-trinh-hoc.url'):
                return view(config('viewCate.chuong-trinh-hoc.url'), 
                            ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            default:
                 return view('front.content.cate', 
                            ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
        }
    }

    public function getDetail ($cate, $slug, CateModel $cateModel) {
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
            case config('viewCate.dk-online.url'):
                return view(config('viewCate.dk-online.view'), 
                            ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.thu-vien-anh.url'):
                return view(config('viewCate.thu-vien-anh.view'),
                        ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.thu-vien-tai-lieu.url'):
                return view(config('viewCate.thu-vien-tai-lieu.view'),
                        ['slug'=>$cate,'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
             case config('viewCate.gioi-thieu-chung.url'):
                return view(config('viewCate.gioi-thieu-chung.view'), 
                        ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.ngay-cua-be.url'):
                return view(config('viewCate.ngay-cua-be.view'), 
                        ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.hoat-dong-ngoai-khoa.url'):
                return view(config('viewCate.hoat-dong-ngoai-khoa.view'), 
                    ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;

            case config('viewCate.chuong-trinh.url'):
                return view(config('viewCate.chuong-trinh.view'), ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break; 
            case 'chuong-trinh-hoc/thuc-don':
                return view('front.content.list', ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
                break;
            case config('viewCate.su-kien.url'):
                return view(config('viewCate.su-kien.view'), ['slug'=>$cate, 'nameCate'=>$cateId->name, 'menu'=> $menu]);
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
