<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\NewModel;
use Storage;

class NewController extends Controller
{
	public function getList(NewModel $newModel, Request $request) {

		$new = $newModel->filterTitle($request->title)
						->filterCate($request->cateId)
					    ->buildCond()
					    ->with('users')
					    ->with('cates')
					    ->orderBy('id','desc')
					    ->paginate(10);
		return response()->json($new);
	}

	public function getInsert(Request $request, NewModel $newModel) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			if ($request->hasFile('file')){
				$path = Storage::disk('public')->putFile('images/news', $request->file);
			}
			$newModel->title   = $request->title;
			$newModel->slug    = sanitizeTitle($request->title);
			$newModel->image   = $path;
			$newModel->content = $request->content;
			$newModel->tag     = $request->tag;
			$newModel->cate    = $request->cate_id;
			$newModel->user_id = 1;
			$newModel->save();

			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$new = NewModel::find($id);
			return response()->json($new);
		} else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request, NewModel $newModel) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$new = $newModel::find($id);
				if ($request->hasFile('file')){
					$this->validateImage($request);
					$path = Storage::disk('public')->putFile('images/news', $request->file);

				}else {
					$path = $new->image;
				}
				$new->title   = $request->title;
				$new->slug    = sanitizeTitle($request->title);
				$new->image   = $path;
				$new->content = $request->content;
				$new->tag     = $request->tag;
				$new->cate    = $request->cate_id;
				$new->user_id = 1;
				$new->save();

				DB::commit();

				return response()->json(['status' => true], 200);

			} catch (Exception $e) {
				DB::rollback();
			}
		}else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}
	
	public function getDelete($id) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$new = NewModel::find($id);

				$new->delete();
				DB::commit();

				return response()->json(['status' => true], 200); 
				
			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'title'   => 'required| unique:news,title| between:1,255',
			'content' => 'required| between:1,50000',
			'file'    => 'required| image',
			], [
			'title.required'   => 'Tiêu đề không được để trống',
			'title.between'    => 'Tiêu đề không được quá 255 kí tự',
			'title.unique'     => 'Đã có tên tiêu đề này',
			'content.required' => 'Nội dung không được bỏ trống',
			'content.between'  => 'Nội dung không được quá 50000 kí tự',
			'file.required'    => 'Ảnh minh họa không được bỏ trống',
			'file.image'       => 'File không phải hình ảnh',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'title'   => 'required| between:1,255',
			'content' => 'required| between:1,50000',
			'file'    => 'required| image',
			], [
			'title.required'   => 'Tiêu đề không được để trống',
			'title.between'    => 'Tiêu đề không được quá 255 kí tự',
			'title.unique'     => 'Đã có tên tiêu đề này',
			'content.required' => 'Nội dung không được bỏ trống',
			'content.between'  => 'Nội dung không được quá 50000 kí tự',
			'file.required'    => 'Ảnh minh họa không được bỏ trống',
			'file.image'       => 'File không phải hình ảnh',
	    	]
		);
	}
	public function validateImage($request) {
		return $this->validate($request, [
			'file'    => 'image',
	    	], [
			'file.image'       => 'File không phải hình ảnh',
	    	]
		);
	}


}
