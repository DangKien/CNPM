<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoModel;
use Session;


Class VideoCtrl extends Controller {

    public function getList(VideoModel $videoModel, Request $request) {
        $video = $videoModel->orderBy('created_at', 'desc')
                            ->paginate(12);

        return  response()->json($video);
    }

    public function getDetail($id, VideoModel $videoModel, Request $request) {
        $video = $videoModel::find($id);
        return  response()->json($video);
    }
}
