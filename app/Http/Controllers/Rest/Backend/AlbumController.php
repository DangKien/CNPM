<?php

namespace App\Http\Controllers\Rest\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session, Storage, Image;
use App\Models\AlbumModel;
use App\Models\FileImageModel;


Class AlbumController extends Controller {

    public function getList(Request $request, AlbumModel $albumModel) {
        $album = $albumModel->filterName($request->name)
                            ->buildCond()
                            ->with('images')
                            ->paginate(8);

        return response()->json($album);
    }

    public function getInsert(Request $request, AlbumModel $albumModel, FileImageModel $fileImageModel) {

        $this->validateInsert($request);
        if (!$request->hasFile('imageAlbum')) {
            return response()->json(['messages' => 'Id không tồn tại'], 422);
        } 
        else {
            //lay ten anh moi
            $path      = $request->imageAlbum->hashName('');
            //cho anh vao lam anh ben trong album
            
            //anh moi thu nho 500x500 px
            $newImage  = Image::make($request->imageAlbum)->resize(500, 500, function ($constraint) {
                 $constraint->aspectRatio();
            })->encode('png');
            // anh cho vao title_image
            
            
            DB::beginTransaction();
            try {
                $albumModel->name  = $request->name;
                $albumModel->cate  = "IMAGE";
                $albumModel->save();

                $fileImageModel->album_id  = $albumModel->id;
                $fileImageModel->url_image = $path;
                $fileImageModel->save();
                
                $image     = Storage::disk('public')->put('images/album/lib_images', $request->imageAlbum);
                $url_image = Storage::disk('public')->put('images/album/title_images/'.$path, $newImage);
                DB::commit();

                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
            }
        }
       
    }

    public function getEdit($id, Request $request) {

        if (isset($id) && !empty($id)) {
            $album = AlbumModel::where('id', $id)->with('images')->first();
            return response()->json($album);
        } else {
            return response()->json(['messages' => 'Id không tồn tại'], 422);
        }
    }

    public function getUpdate($id, Request $request, FileImageModel $fileImage) {
        if (isset($id) && !empty($id)) {

            
            DB::beginTransaction();
            try {
                $album = AlbumModel::find($id);
                if (!$request->hasFile('imageAlbum')) {
                    $path = $album->image;
                    $this->validateUpdate($request);
                    
                } else {
                    $this->validateUpdate($request);
                    $path      = $request->imageAlbum->hashName('');
                    //cho anh vao lam anh ben trong album
                    $image     = Storage::disk('public')->put('images/album/lib_images', $request->imageAlbum);
                    //anh moi thu nho lam anh title
                    $newImage  = Image::make($request->imageAlbum)->resize(500, 500, function ($constraint) {
                         $constraint->aspectRatio();
                    })->encode('png');

                    //cho anh vao title image
                    $url_image = Storage::disk('public')->put('images/album/title_images/'.$path, $newImage);
                }
                
                $album->name  = $request->name;
                $album->image = $path;
                $album->cate  = "IMAGE";
                $album->save();

                $fileImage->album_id  = $id;
                $fileImage->url_image = $path;
                $fileImage->save();

                DB::commit();

                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
            }
        } else {
            return response()->json(['messages' => 'Id không tồn tại'], 422);
        }
    }

    public function getDelete($id) {

        if (isset($id) && !empty($id)) {
            DB::beginTransaction();
            try {
                $album = AlbumModel::find($id)->delete();
              
                DB::commit();
                return response()->json(['status' => true], 200);

            } catch (Exception $e) {
                return response()->json(['messages' => 'Lỗi hệ thống'], 422);
                DB::rollback();
            }
        } else {
            return response()->json(['messages' => 'Id không tồn tại'], 422);
        }
    }

    public function validateInsert($request) {
        return $this->validate($request, [
                    'name'       => 'required',
                    'imageAlbum' =>'required|image'
                    ], [
                    'name.required' => 'Tên không được để trống',
                    'imageAlbum.required' => 'Ảnh không được để trống',
                    'imageAlbum.image' => 'Tệp tin không phải ảnh',
                    ]
        );
    }

    public function validateUpdate($request) {
        return $this->validate($request, [
                    'name' => 'required',
                        ], [
                    'name.required' => 'Tên không được để trống',
                    ]
        );
    }

}
