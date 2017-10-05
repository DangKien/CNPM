<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB, Session;
use App\Models\SlideModel;

class SlideController extends Controller
{
	public function getList() {
		$slide = SlideModel::all();
		return response()->json($slide);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$slide = new SlideModel();
			$slide->title = $request->title;
			$slide->image = $request->image;
			$slide->content = $request->content;
			$slide->status = $request->status;
			$slide->cate = $request->id_cate;
			$slide->save();

			DB::commit();

			return response()->json(['status' => true, 200]);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$slide = SlideModel::find($id);
			return response()->json($slide);
		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$slide = SlideModel::find($id);

				$slide->title = $request->title;
				$slide->image = $request->image;
				$slide->content = $request->content;
				$slide->status = $request->status;
				$slide->cate = $request->id_cate;
				$slide->save();

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
				$slide = SlideModel::find($id)->delete();
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
	    	], [
	        'title.required' => 'Nội dung không được để trống',
	        'title.unique' => 'Đã có tên tiêu đề này',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
	        'title' => 'required',
	    	], [
	        'title.required' => 'Nội dung không được để trống',
	        'title.unique' => 'Đã có tên tiêu đề này',
	    	]
		);
	}


}
