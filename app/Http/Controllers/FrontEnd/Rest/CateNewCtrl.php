<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;
use App\Models\NewModel;


Class CateNewCtrl extends Controller {

    public function getOnePost(NewModel $newModel, $cate, $slug) {
        if ($slug) {
        	$news = $newModel->filterSlug($slug)
        	                ->buildCond()
        	                ->with('cates')
        	                ->with('users')
        	                ->orderBy('created_at', 'desc')
        	                ->first();
        } 
        return  response()->json($news);
    }
}
