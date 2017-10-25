<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\NewModel;
use Storage;

class NewController extends Controller
{
	public function getList(NewModel $newModel, Request $request) {

		$new = $newModel->filterTitle($request->title)
						->filterCate($request->cate_id)
					    ->buildCond()
					    ->with('users')
					    ->with('cates')
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
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function getUpdate($id, Request $request, NewModel $newModel) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$new = $newModel::find($id);
				if ($request->hasFile('file')){
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
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}
	
	public function getDelete($id) {

		if (isset($id)) {
			DB::beginTransaction();
			try {
				$new = NewModel::find($id);
				return $new;
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
			'title'   => 'required|unique:news,title',
			'content' => 'required',
			'file'    => 'required'
	    	], [
			'title.required'   => 'Tiêu đề không được để trống',
			'title.unique'     => 'Đã có tên tiêu đề này',
			'content.required' => 'Nội dung không được bỏ trống',
			'file.required'    => 'Ảnh minh họa không được bỏ trống',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'title'   => 'required',
			'content' => 'required',
	    	], [
			'title.required'   => 'Nội dung không được để trống',
			'content.required' => 'Nội dung không được bỏ trống',
	    	]
		);
	}


}
