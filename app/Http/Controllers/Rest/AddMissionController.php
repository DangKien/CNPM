<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\AddMissionModel;


class CateController extends Controller
{
	public function getList() {
		$mission = AddMissionModel::all();
		return response()->json($mission);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$mission              = new AddMissionModel();
			$mission->name_student        = $request->name_student;
			$mission->gender       = $request->gender;
			$mission->birthday = $request->birthday;
			$mission->class_add      = $request->class_add;
			$mission->phone     = $request->phone;
			$mission->email     = $request->email;
			$mission->address     = $request->address;
			$mission->status     = $request->status;
			$mission->save();

			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	
	public function validateInsert($request){
	    return $this->validate($request, [
			'name_student'        => 'required',
			'gender'       => 'required',
			'birthday' => 'required',
			'class_add'      => 'required',
			'email'      => 'required|email',
			'phone'      => 'required|numeric',
			'address'      => 'required',

	    	], [
			'name_student.required'        => 'Tên học sinh không được để trống',
			'gender.unique'          => 'Giới tính không được để trống',
			'birthday.required'       => 'Ngày sinh không được bỏ trống được bỏ trống',
			'class_add.required' => 'Lớp học đăng kí không được bỏ trống',
			'phone.required'      => 'Số điện thoại không được bỏ trống',
			'phone.numeric'       => 'Số điện thoại phải là số',
			'email.required'       => 'Email không được bỏ trống',
			'email.email'       => 'Email không đúng định dạng',
			'address.required'       => 'Địa chỉ không được bỏ trống'			
	    	]
		);
	}
	

}
