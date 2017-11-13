<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\FileModel;
use Storage, Image, File;

class UploadFileController extends Controller
{
	public function getList(FileModel $fileModel, Request $request) {

		$file = $fileModel->paginate(8);
		return response()->json($file);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			if ($request->hasFile('file')) {
				$path      = $request->image->hashName('');
				$cate_file = $request->file->getClientOriginalExtension();

				$newImage  = Image::make($request->image)->resize(400, 400, function ($constraint) {
				     $constraint->aspectRatio();
				})->encode('png');

				$url_image = Storage::disk('public')->put('images/file/'.$path, $newImage);
				$url_file  = Storage::disk('public')->putFile('file', $request->file);

				$fileModel = new FileModel; 
				$fileModel->title     = $request->title;
				$fileModel->slug      = sanitizeTitle($request->title);
				$fileModel->url_image = $path;
				$fileModel->url_file  = $url_file;
				$fileModel->cate_file = $cate_file;
				$fileModel->save();

			}
			DB::commit();
			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id) { 
		if (isset($id) && !empty($id)) {
		    $file = FileModel::find($id);
		    return response()->json($file);
		} else {
		    return response()->json(['messages' => 'Id không tồn tại'], 422);
		}
	}

	public function getUpdate($id, Request $request) { 
		$fileModel = FileModel::find($id);
		$url_image_de = $fileModel->url_image;
		$url_file_de  = $fileModel->url_file; 
		DB::beginTransaction();
		try {
			if ($request->hasFile('file')) {
				$cate_file = $request->file->getClientOriginalExtension();
				$url_file  = Storage::disk('public')->putFile('file', $request->file);
			}else {
				$url_file  = $fileModel->url_file;
				$cate_file = $fileModel->cate_file;
			}
			if ($request->hasFile('image')) {
				$path      = $request->image->hashName('');
				$newImage  = Image::make($request->image)->resize(400, 400, function ($constraint) {
				     $constraint->aspectRatio();
				})->encode('png');
				$url_file = Storage::disk('public')->put('images/file/'.$path, $newImage);
			} else {
				$path = $fileModel->url_image;
			}

			$fileModel->title     = $request->title;
			$fileModel->slug      = sanitizeTitle($request->title);			
			$fileModel->url_image = $path;
			$fileModel->url_file  = $url_file;
			$fileModel->cate_file = $cate_file;
			$fileModel->save();

			
			DB::commit();
			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getDelete($id, FileModel $fileModel) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$delete_file = $fileModel::find($id);

				$file_name = public_path().'/storage/images/file/'.$delete_file->url_image;
				$file_title = public_path().'/storage/'.$delete_file->url_file;

				File::delete([$file_name, $file_title]);

				$delete_file->delete();
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
			'image' => 'required|image',
			'file'  => 'required',
			'title' => 'required',
	    	], [
			'image.required' => 'Ảnh minh họa không được bỏ trống',
			'image.image'    => 'Ảnh minh họa không đúng định dạng',
			'title.required' => 'Tiêu đề không được bỏ trống',
			'file.required'  => 'Tài liệu không được trống',
	    	]
		);
	}

}
