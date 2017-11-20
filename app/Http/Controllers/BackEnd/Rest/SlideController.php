<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use Storage, Image, File;
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
			$slide  = new SlideModel();
			if ($request->hasFile('imageSlide')) {
				$path      = $request->imageSlide->hashName('');

				$newImageTitle  = Image::make($request->imageSlide)->resize(380, 133)->encode('png');

				$newImageSlide  = Image::make($request->imageSlide)->resize(1000, 350)->encode('png');
				
			} else {
				return response()->json(['messages' => "Không tìm thấy ảnh"], 422);
			}
			$slide->title       = $request->title;
			$slide->slug    = sanitizeTitle($request->title);
			$slide->image       = $path;
			$slide->content     = $request->content;
			$slide->status      = $request->status;
			$slide->user_create = 1;
			$slide->save();

			// cho lam anh slide show
			$imageSlide = Storage::disk('public')->put('images/slides/images_slides/'.$path, $newImageSlide);
			// chov vao lam anh quan li
			$imageTitle = Storage::disk('public')->put('images/slides/title_slides/'.$path, $newImageTitle);
			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {

			DB::rollback();
			return response()->json(['messages' => "Lỗi hệ thống"], 422);
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$slide = SlideModel::find($id);
			return response()->json($slide);
		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id)){

			$slide = SlideModel::find($id);
			$url_image_slide = $slide->image;
			if ($request->hasFile('imageSlide')) {
				$this->validateUpdate($request);
				$path          = $request->imageSlide->hashName('');
				$newImageTitle = Image::make($request->imageSlide)->resize(380, 133)->encode('png');
				$newImageSlide = Image::make($request->imageSlide)->resize(1000, 350)->encode('png');
				$imageSlide = Storage::disk('public')->put('images/slides/images_slides/'.$path, $newImageSlide);
				// chov vao lam anh quan li
				$imageTitle = Storage::disk('public')->put('images/slides/title_slides/'.$path, $newImageTitle);
				$slideImage = public_path().'/storage/images/slides/images_slides/'.$url_image_slide;
				$slideTitle = public_path().'/storage/images/slides/title_slides/'.$url_image_slide;
				File::delete([$slideImage, $slideImage]);

			} else {
				$path = $url_image_slide;
			}

			DB::beginTransaction();
			try {
				$slide->title       = $request->title;
				$slide->slug        = sanitizeTitle($request->title);
				$slide->image       = $path;
				$slide->content     = $request->content;
				$slide->status      = $request->status;
				$slide->user_create = 1;
				$slide->save();  

				

				DB::commit();
				
				return response()->json(['status' => true], 200);

			} catch (Exception $e) {
				DB::rollback();
				return response()->json(['messages' => "Lỗi hệ thống"], 422);
			}
		}else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}
	
	public function getDelete($id) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$slide = SlideModel::find($id);

				$slideImage = public_path().'/storage/images/slides/images_slides/'.$slide->image;
				$slideTitle = public_path().'/storage/images/slides/title_slides/'.$slide->image;

				File::delete([$slideImage, $slideTitle]);
				$slide->delete();

				DB::commit();
				return response()->json(['status' => true], 200); 

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'title'      =>'required',
			'content'      =>'required',
			'imageSlide' => 'required|image',
	    	], [
			'imageSlide.required' => 'Ảnh không được để trống',
			'imageSlide.image'    => 'File không phải ảnh ',
			'title.required'         => 'Tiêu đề không được bỏ trống ',
			'content.required'         => 'Nội dung không được bỏ trống',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'imageSlide' => 'image',
			'content'      =>'required',
			'title'      =>'required'
	    	], [
			'imageSlide.image' => 'File không phải ảnh ',
			'title.required'      => 'Tiêu đề không được bỏ trống ',
			'content.required'         => 'Nội dung không được bỏ trống',
	    	]
		);
	}


}
