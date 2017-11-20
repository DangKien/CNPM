<?php

namespace App\Http\Controllers\FrontEnd\Download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileModel;



Class FileCtrl extends Controller {

    public function getDownload(FileModel $fileModel, $idFile) {
        if (!$idFile) {
            return response()->json(['messages'=>'Không tìm thấy id']);
        }
        $file = $fileModel::find($idFile);
        $path = public_path('/storage/' . $file->url_file);
        return response()->download($path);
    }
}
