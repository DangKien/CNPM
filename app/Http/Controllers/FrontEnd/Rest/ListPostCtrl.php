<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlbumModel;
use App\Models\FileImageModel;
use App\Models\NewModel;


Class ListPostCtrl extends Controller {

    public function getListPost(NewModel $newModel, $slug) {
        $album = $newModel->filterSlug($slug)
	                      ->buildCond()
	                      ->with('cates')
	                      ->orderBy('created_at', 'desc')
        				  ->paginate(5);
                            
        return  response()->json($album);
    }
}
