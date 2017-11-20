<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlbumModel;
use App\Models\FileImageModel;


Class ImageCtrl extends Controller {

    public function getAlbumImage(AlbumModel $albumModel) {
        $album = $albumModel->with('images')
        					->orderBy('created_at', 'desc')
                            ->paginate(12);
                            
        return  response()->json($album);
    }

    public function getAlbum(AlbumModel $albumModel, $idAlbum) {
        $album = $albumModel::find($idAlbum);
                            
        return  response()->json($album);
    }

    public function getImage(FileImageModel $fileImageModel, $idAlbum) {
        if (!$idAlbum) {
        	return response()->json(['messages'=> "Không tìm thấy id"], 422);
        }

        $image = $fileImageModel->filterAlbumId($idAlbum)
        						->buildCond()
        						->paginate(21);
                            
        return  response()->json($image);
    }
}
