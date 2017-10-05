<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB, Session;
use App\User;

class UserController extends Controller
{
	public function getList() {
		$user = User::all();
		return response()->json($user);
	}

	public function getInsert(Request $request) { 

		$this->validateInsert($request);
		DB::beginTransaction();
		try {
			$user = new User();
			$user->name = $request->name;
			$user->account = $request->account;
			$user->email = $request->email;
			$user->password = "123456";
			$user->gender = $request->gender;
			$user->phone = $request->phone;
			$user->birthday = $request->birthday;
			$user->address = $request->address;
			$user->status = $request->status;
			$user->avatar = $request->avatar;
			$user->job = $request->job;
			$user->is_admin = $request->is_admin;

			$user->save();

			DB::commit();

			return response()->json(['status' => true, 200]);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, Request $request) {

		if (isset($id)) {
			$user = User::find($id);
			return response()->json($user);
		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function getUpdate($id, Request $request) {
		if (isset($id)){
			$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				$user = User::find($id);

				$user->name = $request->name;
				$user->email = $request->email;
				$user->gender = $request->gender;
				$user->phone = $request->phone;
				$user->birthday = $request->birthday;
				$user->address = $request->address;
				$user->status = $request->status;
				$user->avatar = $request->avatar;
				$user->job = $request->job;
				$user->is_admin = $request->is_admin;
				$user->save();

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
				$user = User::find($id)->delete();
				return response()->json(['status' => true, 200]); 
				DB::commit();

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['status' => 'Id không tồn tại', 422]); 
		}
	}

	public function changePass($id, Request $request) {
		if (isset($id)) {
			$user = User::find($id);
			$user->password = $request->new_password;
		}
		
	}


	public function validateInsert($request){
	    return $this->validate($request, [
	        'email' => 'required|unique:users,email',
	        'account' => 'required|unique:users,account',
	        'name' => 'required',
	        'gender' => 'required',
	        'phone' => 'required|numeric',
	        'birthday' => 'required|date',
	        'address' => 'required',
	        'status' => 'required',
	        'job' => 'required',

	    	], [
	        'email.required' => 'Email không được để trống',
	        'email.unique' => 'Email đã được đăng kí',
	        'account.required' => 'Tài khoản không được để trống',
	        'account.unique' => 'Tài khoản đã được sử dụng',
	        'name.required' => 'Tên người dùng không được để trống',
	        'gender.required' => 'Giới tính không được để trống',
	        'phone.required' => 'Số điện thoại không được để trống',
	        'phone.numeric' => 'Số điện thoại không đúng định dạng',
	        'birthday.required' => 'Ngày sinh không được để trống',
	        'birthday.date' => 'Ngày sinh không đúng định dạng',
	        'address.required' => 'Địa chỉ không được để trống',
	        'status.required' => 'Trạng thái không được để trống',
	        'job.required' => 'Công việc không được để trống',
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
	        'email' => 'required|',
	        'name' => 'required',
	        'gender' => 'required',
	        'phone' => 'required|number',
	        'birthday' => 'required|date',
	        'address' => 'required',
	        'status' => 'required',
	        'job' => 'required',

	    	], [
	        'email.required' => 'Email không được để trống',
	        'name.required' => 'Tên người dùng không được để trống',
	        'gender.required' => 'Giới tính không được để trống',
	        'phone.required' => 'Số điện thoại không được để trống',
	        'birthday.required' => 'Ngày sinh không được để trống',
	        'address.required' => 'Địa chỉ không được để trống',
	        'status.required' => 'Trạng thái không được để trống',
	        'job.required' => 'Công việc không được để trống',
	    	]
		);
	}

	public function validateChangePass($request){
	    return $this->validate($request, [
	        'password' => 'required',
	        'new_password'=>'required',
	        'conf_password'=>'required'
	    	], [
	        'password.required' => 'Mật khẩu không được để trống',
	        'new_password.required' => 'Mật khẩu mới không được bỏ trống',
	        'conf_password.required' => 'Nhập lại mật khẩu',

	    	]
		);
	}


}
