<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileModel;


Class FileCtrl extends Controller {

    public function getFile (FileModel $fileModel){
        $file = $fileModel::select('title', 'id', 'created_at', 'cate_file', 'url_image')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return response()->json($file);
    }
    
}
