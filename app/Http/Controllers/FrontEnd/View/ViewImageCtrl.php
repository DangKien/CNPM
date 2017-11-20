<?php

namespace App\Http\Controllers\FrontEnd\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;


Class ViewImageCtrl extends Controller {

    public function getDetailImage ($cate, $slug, $id,CateModel $cateModel){
    	$cateId = $cateModel::select('id', 'slug', 'name')
    							->where('slug', $cate)
    							->first();				
    	$menu   = $cateModel::select('id', 'slug', 'name')
    						  ->where('cate_id', $cateId->id)
    						  ->get();
    	return view('front.content.album.image', [
    											'slug'=>$cate,
    											'nameCate'=>$cateId->name, 
    											'menu'=> $menu,
    											'idAlbum' => $id]);
        
    }


    
}
