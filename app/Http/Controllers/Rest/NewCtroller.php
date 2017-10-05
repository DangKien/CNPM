<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB, Session;
use App\Models\NewModels;

class NewController extends Controller
{
	public function getList() {
		$new = NewModel::all();
		return response()->json($new);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$new = new NewModel();
			$new->title = $request->title;
			$new->image = $request->image;
			$new->content = $request->content;
			$new->tag = $request->tag;
			$new->cate = $request->id_cate;
			$new->save();

			DB::commit();

			return response()->json(['status' => true, 200]);

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

	public function getUpdate($id, Request $request) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$new = NewModel::find($id);

				$new->title = $request->title;
				$new->image = $request->image;
				$new->content = $request->content;
				$new->tag = $request->tag;
				$new->cate = $request->id_cate;
				$new->save();

				DB::commit();

				return response()->json(['status' => true, 200]);

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
				$new = NewModel::find($id)->delete();
				return response()->json(['status' => true, 200]); 
				DB::commit();

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
	        'title' => 'required|unique:catetogys,name',
	        'content' => 'required',
	    	], [
	        'title.required' => 'Nội dung không được để trống',
	        'title.unique' => 'Đã có tên tiêu đề này',
	        'content.required' => 'Nội dung không được bỏ trống',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
	        'title' => 'required',
	        'content' => 'required',
	    	], [
	        'title.required' => 'Nội dung không được để trống',
	        'content.required' => 'Nội dung không được bỏ trống',
	    	]
		);
	}


}
