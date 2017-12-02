<?php

namespace App\Http\Controllers\FrontEnd\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\MenuModel;


Class ViewMenuCtrl extends Controller {

    public function getDetailMenu ($cate, $slug, $id, CateModel $cateModel, MenuModel $menuModel){
    	$cateId = $cateModel::select('id', 'slug', 'name')
    							->where('slug', $cate)
    							->first();				
    	$menu   = $cateModel::select('id', 'slug', 'name')
    						  ->where('cate_id', $cateId->id)
    						  ->get();
        $detail = $menuModel::where('id', $id)->first();
    	return view('front.content.menu.detailMenu', [
    											'slug'=>$cate,
    											'nameCate'=>$cateId->name, 
    											'menu'=> $menu,
    											'idAlbum' => $id,
                                                'detail' => $detail]);
        
    }
}
