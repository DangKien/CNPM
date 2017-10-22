<?php

namespace App\Http\Controllers\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateModel;
use DB;
class CateController extends Controller
{
	public function getList(CateModel $cate, Request $request) {
		$page = $request->per_page;
		if ($page != 0) {
			$data = $cate->filterName($request->name)
					 ->filterStatus($request->status)
					 ->buildCond()
					 ->with('users')
					 ->orderBy('id', 'desc')
					 ->paginate($page);
		} else if ($page == 0) {
			$data = $cate->select("name", "id", 'cate_id')
						 ->get();
		}
		
		return $data;
	}

	public function getInsert(Request $request, CateModel $cate) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$cate->name        = $request->name;
			$cate->slug        = sanitizeTitle($request->name);
			$cate->tag         = $request->tag;
			$cate->status      = $request->status;
			$cate->cate_id     = $request->cate_id;
			$cate->user_create = 1;
			$cate->save();

			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id) && !empty($id)) {
			$cate = CateModel::find($id);
			return response()->json($cate);
		} else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id) && !empty($id)) {
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$cate = CateModel::find($id);

				$cate->name        = $request->name;
				$cate->slug        = sanitizeTitle($request->name);
				$cate->tag         = $request->tag;
				$cate->status      = $request->status;
				$cate->cate_id     = $request->cate_id;
				$cate->user_create = 1;
				$cate->save();

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

		if (isset($id) && !empty($id)) {
			DB::beginTransaction();
			try {
				$cate = CateModel::find($id)->delete();
				DB::commit();
				return response()->json(['status' => true], 200); 
				

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['status' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'name'        => 'required|unique:catetogys,name',
	    	], [
			'name.required'        => 'Tên tiêu đề không được để trống',
			'name.unique'          => 'Đã có tên tiêu đề này',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'        => 'required',
	    	], [
			'name.required'        => 'Tên tiêu đề không được để trống',
	    	]
		);
	}
}
