<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use Session;


Class MenuCtrl extends Controller {

    public function getList(MenuModel $menuModel, Request $request) {
        $menu = $menuModel::select('*')->orderBy('created_at', 'desc')->get();

        return  response()->json($menu);
    }

    public function getDetailNews(NewModel $newModel, $id, Request $request) {
        if (!$id) {
            return response()->json(['messages'=> "Không tìm thấy id"], 422);
        }
        $news = $newModel::where('id', $id)
                            ->with('users')
                            ->first();
        $flag = Session::get('views');
        if ($flag != $request->ip().'_'.$id) {
            $news->view = $news->view + 1;
            $news->save();
            Session::put('views', $request->ip()."_".$id);
        }
        return  response()->json($news);
    }
   
}
