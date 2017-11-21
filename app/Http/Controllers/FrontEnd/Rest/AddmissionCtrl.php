<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddMissionModel;
use DB;


Class AddmissionCtrl extends Controller {

    public function getAddmission (Request $request, AddMissionModel $addMissionModel){
    	$this->validateInsert($request);
    	$nameStudent = $request->nameStudent;
    	$gender      = $request->gender ;
    	$birthday    = $request->birthday ;
    	$nameParent  = $request->nameParent ;
    	$email       = $request->email;
    	$phone       = $request->phone;
    	$address     = $request->address;
    	$message     = $request->message;
		DB::beginTransaction();
		try {
			$addMissionModel->name_student = $nameStudent;
			$addMissionModel->gender       = $gender;
			$addMissionModel->birthday     = $birthday;
			$addMissionModel->name_parent  = $nameParent;
			$addMissionModel->email        = $email;
			$addMissionModel->phone        = $phone;
			$addMissionModel->address      = $address;
			$addMissionModel->message      = $message;
			$addMissionModel->save();
			DB::commit();
			return response()->json(['status'=>true], 200);

		} catch (Exception $e) {
			return response()->json(['message'=>'Lỗi hệ thống'], 422);
		}
		


    }

    public function validateInsert($request) {
    	return $this->validate($request, [
			'nameStudent' => 'required',
			'gender'      => 'required',
			'birthday'    => 'required|date_format:"Y-m-d"',
			'nameParent'  => 'required',
			'phone'       => 'required|numeric|digits_between:6,15',
			'address'     => 'required',
			'message'     => 'required',
			'email'       => 'required|email',
            ], [
			'nameStudent.required' => 'Tên học sinh không được để trống',
			'gender.required'      => 'Giới tính không được để trống',
			'birthday.required'    => 'Ngày sinh không được để trống',
			'birthday.date_format' => 'Ngày sinh không đúng định dạng',
			'nameParent.required'  => 'Tên phụ huynh không được để trống',
			'phone.required'       => 'Số điện thoại không được để trống',
			'phone.numeric'        => 'Số điện thoại không đúng định dạng',
			'phone.digits_between' => 'Số điện thoại từ 6 số đến 15 số',
			'address.required'     => 'Địa chỉ không được để trống',
			'mesage.required'      => 'Tin nhắn không được để trống',
			'email.required'       => 'Email bạn không được để trống',
			'email.email'          => 'Email bạn không đúng định dạng',
            ]
    	);
    }
    
}
