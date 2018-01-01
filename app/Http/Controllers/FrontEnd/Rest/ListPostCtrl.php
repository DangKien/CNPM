<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlbumModel;
use App\Models\FileImageModel;
use App\Models\NewModel;


Class ListPostCtrl extends Controller {

    public function getListPost(NewModel $newModel, $slug, Request $request) {

        $perPage = empty($request->perPgae) ? 10 : $request->perPgae;
        if ($request->view == 'AVAILABLE') {
            $newPost = $newModel->filterSlug($slug)
                              ->buildCond()
                              ->with('cates')
                              ->orderBy('view', 'desc')
                              ->get();
        } else {
            $newPost = $newModel->filterSlug($slug)
                          ->buildCond()
                          ->with('cates')
                          ->orderBy('created_at', 'desc')
                          ->paginate($perPage);
        }
                            
        return  response()->json($newPost);
    }

    public function getPost(NewModel $newModel, $slug, $slugDetail) {
        $newPost = $newModel->filterSlug($slugDetail)
	                      ->buildCond()
	                      ->with('cates')
	                      ->orderBy('created_at', 'desc')
        				  ->paginate(10);
                            
        return  response()->json($newPost);
    }
}
