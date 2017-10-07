<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\CateModel;


class CateController extends Controller
{
	public function getList() {
		$cate = CateModel::all();
		return response()->json($cate);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$cate              = new CateModel();
			$cate->name        = $request->name;
			$cate->title       = $request->title;
			$cate->description = $request->description;
			$cate->status      = $request->status;
			$cate->id_cate     = $request->id_cate;
			$cate->save();

			DB::commit();

			return response()->json(['status' => true, 200]);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$cate = CateModel::find($id);
			return response()->json($cate);
		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$cate = CateModel::find($id);

				$cate->name        = $request->name;
				$cate->title       = $request->title;
				$cate->description = $request->description;
				$cate->status      = $request->status;
				$cate->id_cate     = $request->id_cate;
				$cate->save();

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
				$cate = CateModel::find($id)->delete();
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
			'name'        => 'required|unique:catetogys,name',
			'title'       => 'required',
			'description' => 'required',
			'status'      => 'required|numeric'
	    	], [
			'name.required'        => 'Tên tiêu đề không được để trống',
			'name.unique'          => 'Đã có tên tiêu đề này',
			'title.required'       => 'Địa chỉ đơn vị không được bỏ trống',
			'description.required' => 'Mô tả không được bỏ trống',
			'status.required'      => 'Trạng thái liên lạc không được bỏ trống',
			'status.numeric'       => 'Trạng thái phải là số'
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'        => 'required',
			'title'       => 'required',
			'description' => 'required',
			'status'      => 'required|numeric'
	    	], [
			'name.required'        => 'Tên tiêu đề không được để trống',
			'title.required'       => 'Địa chỉ đơn vị không được bỏ trống',
			'description.required' => 'Mô tả không được bỏ trống',
			'status.required'      => 'Trạng thái liên lạc không được bỏ trống',
			'status.numeric'       => 'Trạng thái phải là số'
	    	]
		);
	}


}
