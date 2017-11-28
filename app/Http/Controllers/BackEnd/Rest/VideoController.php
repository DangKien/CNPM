<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session, Storage, Image, Youtube;
use App\Models\VideoModel;


Class VideoController extends Controller {

    public function getList(Request $request, VideoModel $videoModel) {
        $video = $videoModel->paginate(10);

        return response()->json($video);
    }

    public function getInsert(Request $request, VideoModel $videoModel) {
        set_time_limit(60*30);
        $this->validateInsert($request);
        if (!$request->hasFile('video') || !$request->hasFile('image')) {
            return response()->json(['message' => 'Video hoặc ảnh không tồn tại'], 422);
        } 
        else {
            //lay ten anh moi
            $path      = $request->image->hashName('');
            //anh moi thu nho 500x500 px
            $newImage  = Image::make($request->image)->resize(500, 500, function ($constraint) {
                 $constraint->aspectRatio();
            })->encode('png');

            $video = Youtube::upload($request->video->getRealPath(), [
                'title'       => $request->title,
                'description' => $request->content,
                'tags'        => ['mam non'],
                'category_id' => 27
            ]);

            
            DB::beginTransaction();
            try {
                $videoModel->title        = $request->title;
                $videoModel->slug         = sanitizeTitle($request->title);
                $videoModel->content      = $request->content;
                $videoModel->url_image    = $path;
                $videoModel->url_video    = "https://www.youtube.com/watch?v=".$video->getVideoId();
                $videoModel->video_ytb_id = $video->getVideoId();
                $videoModel->cate_video   = "YOUTUBE";
                $videoModel->save();

                $url_image = Storage::disk('public')->put('images/video/'.$path, $newImage);
                DB::commit();

                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
            }
        }  
    }

    public function getEdit($id, Request $request, VideoModel $videoModel) {

        if (isset($id) && !empty($id)) {
            $video = $videoModel::find($id);
            return response()->json($video);
        } else {
            return response()->json(['status' => 'Id không tồn tại'], 422);
        }
    }

    public function getUpdate($id, Request $request, VideoModel $videoModel) {
        if (!$request->hasFile('video') || !$request->hasFile('image')) {
            return response()->json(['message' => 'Video hoặc ảnh không tồn tại'], 422);
        } 
        else {
            $videoUpdate = VideoModel::find($id);
            //lay ten anh moi
            $path      = $request->image->hashName('');
            //anh moi thu nho 500x500 px
            $newImage  = Image::make($request->image)->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('png');

            $video = Youtube::upload($request->video->getRealPath(), [
                'title'       => $request->title,
                'description' => $request->content,
                'tags'        => ['mam non'],
                'category_id' => 27
            ]);
            DB::beginTransaction();
            try {
                $videoUpdate->title     = $request->title;
                $videoUpdate->slug      = sanitizeTitle($request->title);
                $videoUpdate->content   = $request->content;
                $videoUpdate->url_video = "https://www.youtube.com/watch?v=".$video->getVideoId();
                $videoUpdate->save();

                $url_image = Storage::disk('public')->put('images/video/'.$path, $newImage);
                DB::commit();

                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
                }
            }
    }

    public function getDelete($id) {

        if (isset($id) && !empty($id)) {
            DB::beginTransaction();
            try {
                $video   = videoModel::find($id);
                $videoId = $video->video_ytb_id;
                $video->delete();
                DB::commit();
                Youtube::delete($videoId);

                return response()->json(['status' => true], 200);

            } catch (Exception $e) {
                return response()->json(['message' => 'Lỗi hệ thống'], 422);
                DB::rollback();
            }
        } else {
            return response()->json(['status' => 'Id không tồn tại'], 422);
        }
    }

    public function validateInsert($request) {
        return $this->validate($request, [
            'title'   => 'required| between: 1,255',
            'content' => 'required| between: 1,255',
            'video'   => 'required| mimes: "mp4", "x-flv", "x-mpegURL", "MP2T", "3gpp", "quicktime", "x-msvideo", "x-ms-wmv"',
            'image'   => 'required| image',
            ], [
            'title.required'   => 'Tên video không được để trống',
            'title.between'    => 'Tên video không được quá 255 kí tự',
            'content.required' => 'Nội dung video không được để trống',
            'content.between'  => 'Nội dung không quá 255 kí tự',
            'video.required'   => 'Video không được để trống',
            'video.mimes'       => 'Video phải dạng avi, mpeg, mp4, mov, flv, 3gpp,...',
            'image.required'   => 'Ảnh không được để trống',
            'image.image'      => 'Ảnh phải dạng jpg, png, jpeg,...',
            ]
        );
    }

}
