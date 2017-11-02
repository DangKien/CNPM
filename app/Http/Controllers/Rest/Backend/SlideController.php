<?php

namespace App\Http\Controllers\Rest\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use Storage;
use App\Models\SlideModel;

class SlideController extends Controller
{
	public function getList() {
		$slide = SlideModel::select('*')
						   ->paginate(10);
		return response()->json($slide);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$slide              = new SlideModel();
			if ($request->hasFile('imageSlide')) {
				$path = Storage::disk('public')->putFile('images/slides', $request->imageSlide);
			} else {
				return response()->json(['message' => "Không tìm thấy ảnh"], 422);
			}
			$slide->title       = $request->title;
			$slide->image       = $path;
			$slide->content     = $request->content;
			$slide->status      = $request->status;
			$slide->user_create = 1;
			$slide->save();

			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {

			DB::rollback();
			return response()->json(['message' => "Lỗi hệ thống"], 422);
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$slide = SlideModel::find($id);
			return response()->json($slide);
		} else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id)){

			$slide = SlideModel::find($id);
			if ($request->hasFile('imageSlide')) {
				$this->validateUpdate($request);
				$path = Storage::disk('public')->putFile('images/slides', $request->imageSlide);
			} else {
				$path = $slide->image;
			}

			DB::beginTransaction();
			try {
				$slide->title       = $request->title;
				$slide->image       = $path;
				$slide->content     = $request->content;
				$slide->status      = $request->status;
				$slide->user_create = 1;
				$slide->save();

				DB::commit();

				return response()->json(['status' => true], 200);

			} catch (Exception $e) {
				DB::rollback();
				return response()->json(['message' => "Lỗi hệ thống"], 422);
			}
		}else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}
	
	public function getDelete($id) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$slide = SlideModel::find($id)->delete();
				return response()->json(['status' => true], 200); 
				DB::commit();

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'imageSlide' => 'required|image',
	    	], [
			'imageSlide.required' => 'Ảnh không được để trống',
			'imageSlide.image'    => 'File không phải ảnh ',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
	        'imageSlide' => 'image',
	    	], [
			'imageSlide.image'    => 'File không phải ảnh ',
	    	]
		);
	}


}
