<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;
use App\Models\NewModel;
use Session;


Class CateNewCtrl extends Controller {

    public function getOnePost(NewModel $newModel, $cate, $slug, Request $request) {
        if (!$slug) {
            return response()->json(['messages'=> "Không tìm thấy slug"], 404);
        }
    	$news = $newModel->filterSlug($slug)
    	                ->buildCond()
    	                ->with('cates')
    	                ->with('users')
    	                ->orderBy('created_at', 'desc')
    	                ->first();
        $flag = Session::get('views');
        if ($flag != $request->ip().'_'.$news->id) {
            $news->view = $news->view + 1;
            $news->save();
            Session::put('views', $request->ip()."_".$news->id);
        }

        return  response()->json($news);
    }

    public function getDetailNews(NewModel $newModel, $id) {
        if (!$id) {
            return response()->json(['messages'=> "Không tìm thấy id"], 422);
        }
        $news = $newModel::where('id', $id)
                            ->with('users')
                            ->first();
        $flag = Session::get('views');
        if ($flag == Request::ip().'_'.$id) {
            $news->view = $news->view + 1;
            $news->save();
            Session::put('views', $request->ip()."_".$id);
        }
        return  response()->json($news);
    }
   
}
