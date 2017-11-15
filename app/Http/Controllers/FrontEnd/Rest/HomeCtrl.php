<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;


Class HomeCtrl extends Controller {

    public function getMainMenu (CateModel $cateModel){
        $cate = $cateModel::select('id', 'name')
                            ->where('cate_id', 0)
                            ->orderBy('priority', 'asc')
                            ->get();
        return response()->json($cate);
    }

    public function getSlider (SlideModel $sildeModel) {
    	$silde = $sildeModel::select('title', 'content', 'image', 'id')
	    					  ->where('status', 'AVAILABLE')
	    					  ->orderBy('id', 'desc')
	    					  ->limit('3')
	    					  ->get();

	    return response()->json($silde);			
    }

    public function getLibImage (FileImageModel $fileImageModel) {
    	$libImage = $fileImageModel::select('url_image', 'id')
	    					  ->inRandomOrder()
	    					  ->limit('10')
	    					  ->get();

	    return response()->json($libImage);			
    }
    
}
