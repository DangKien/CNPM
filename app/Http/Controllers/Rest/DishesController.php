<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\DishesModel;


class DishesController extends Controller
{
	public function getList(Request $request, DishesModel $dishes) {
		$a = $dishes::all();

		return response()->json($a);
	}

	public function getInsert(Request $request, DishesModel $dishes) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$dishes->name        = $request->name;
			$dishes->image       = $request->image;
			$dishes->description = $request->description;
			$dishes->user_id      = $request->user_id;
			$dishes->speacies     = $request->speacies;
			$dishes->save();

			DB::commit();

			return response()->json(['status' => true, 200]);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id) && !empty($id)) {
			$dishes = DishesModel::find($id);
			return response()->json($dishes);
		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id) && !empty($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$dishes = DishesModel::find($id);

				$dishes->name        = $request->name;
				$dishes->image       = $request->image;
				$dishes->description = $request->description;
				$dishes->status      = $request->status;
				$dishes->user_id      = $request->user_id;
				$dishes->speacies     = $request->speacies;
				$dishes->save();

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

		if (isset($id) && !empty($id)) {
			DB::beginTransaction();
			try {
				$dishes = DishesModel::find($id)->delete();
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
			'description' => 'required',
			'speacies'    => 'required'
	    	], [
			'name.required'        => 'Tên mớn không được để trống',
			'name.unique'          => 'Đã có món ăn này',
			'description.required' => 'Mô tả món ăn không được bỏ trống',
			'speacies.required'    => 'Loại món ăn được bỏ trống'
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'        => 'required',
			'speacies'       => 'required',
			'description' => 'required',
	    	], [
			'name.required'        => 'Tên mớn không được để trống',
			'description.required' => 'Mô tả món ăn không được bỏ trống',
			'speacies.required'    => 'Loại món ăn được bỏ trống'
	    	]
		);
	}
}
