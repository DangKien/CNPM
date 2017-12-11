<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\FileImageModel;
use Storage, Image, File;

class FileImgController extends Controller
{
	public function getList(FileImageModel $fileImageModel, Request $request) {
		$fileImage = $fileImageModel->filterAlbumId($request->albumId)
									->buildCond()
									->orderBy('id','desc')
									->paginate(16);
		return response()->json($fileImage);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			if ($request->hasFile('image')) {
				$album_id = $request->idAblum;
				//lap anh vao 
				foreach ($request->image as $key => $image) {
					$path      = $image->hashName('');

					$newImage  = Image::make($image)->resize(500, 500, function ($constraint) {
					     $constraint->aspectRatio();
					})->encode('png');

					$image     = Storage::disk('public')->put('images/album/lib_images', $image);
					$url_image = Storage::disk('public')->put('images/album/title_images/'.$path, $newImage);
					$fileImageModel = new FileImageModel; 
					$fileImageModel->url_image = $path;
					$fileImageModel->album_id  = $album_id;
					$fileImageModel->save();
					
				}
			}
			DB::commit();
			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit(FileImageModel $fileImageModel, Request $request, $id) {
		$fileImage = $fileImageModel::find($id);

		return response()->json($fileImage);
	}

	public function getUpdate(Request $request, $id, FileImageModel $fileImageModel) { 
		DB::beginTransaction();
		try {
			$fileImage = $fileImageModel::find($id);
			
			$fileImage->title = $request->name;
			$fileImage->save();
			DB::commit();
			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getDelete($id, FileImageModel $fileImageModel) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$fileImage = $fileImageModel::find($id);
				$filename_lib = public_path().'/storage/images/album/lib_images/'.$fileImage->url_image;
				$filename_title = public_path().'/storage/images/album/title_images/'.$fileImage->url_image;
				File::delete([$filename_lib, $filename_title]);

				$fileImage->delete();
				DB::commit();
				return response()->json(['status' => true], 200); 

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['messages' => 'Id không tồn tại', 422]); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'image'    => 'required',
			'idAblum'  => 'required'
	    	], [
			'image.required'    => 'Ảnh không được bỏ trống',
			'idAblum.required'  => 'Id Album không được trống',
	    	]
		);
	}


}
