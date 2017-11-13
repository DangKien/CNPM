<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;


Class HomeCtrl extends Controller {

    public function getMenuMain (CateModel $cateModel){
        $cate = $cateModel::select('id', 'name')
                            ->
    }
    
}
