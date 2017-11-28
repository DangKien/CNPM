<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddMissionModel;
use DB;
use App\Libs\EventSocket;


Class AddmissionCtrl extends Controller {

    public function getAddmission (Request $request, AddMissionModel $addMissionModel, EventSocket $redis) {
    	$this->validateInsert($request);
    	$nameStudent = ucwords($request->nameStudent);
    	$gender      = $request->gender ;
    	$birthday    = $request->birthday ;
    	$nameParent  = ucwords($request->nameParent);
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
            $redis->socketIO('addmission', $addMissionModel);
			return response()->json(['status'=>true], 200);

		} catch (Exception $e) {
			DB::rollback();
			return response()->json(['message'=>'Lỗi hệ thống'], 422);
		}
		


    }

    public function validateInsert($request) {
    	return $this->validate($request, [
			'nameStudent' => 'required| between: 1,255',
			'gender'      => 'required| between: 1,11',
			'birthday'    => 'required| date_format:"Y-m-d"',
			'nameParent'  => 'required| between: 1,255',
			'phone'       => 'required| numeric| digits_between:6,15',
			'address'     => 'required| between: 1,255',
			'email'       => 'required| email| between: 1,255',
            ], [
			'nameStudent.required' => 'Tên học sinh không được để trống',
			'nameStudent.between'  => 'Tên học sinh không được quá 255 kí tự',
			'gender.required'      => 'Giới tính không được để trống',
			'gender.between'       => 'Giới tính không được quá 11 kí tự',
			'birthday.required'    => 'Ngày sinh không được để trống',
			'birthday.date_format' => 'Ngày sinh không đúng định dạng',
			'nameParent.required'  => 'Tên phụ huynh không được để trống',
			'nameParent.between'   => 'Tên phụ huynh không được quá 255 kí tự',
			'phone.required'       => 'Số điện thoại không được để trống',
			'phone.numeric'        => 'Số điện thoại không đúng định dạng',
			'phone.digits_between' => 'Số điện thoại từ 6 số đến 15 số',
			'address.required'     => 'Địa chỉ không được để trống',
			'address.between'      => 'Địa chỉ không quá 255 kí tự',
			'email.required'       => 'Email bạn không được để trống',
			'email.email'          => 'Email bạn không đúng định dạng',
			'email.between'        => 'Email bạn không quá 255 kí tự',
            ]
    	);
    }
    
}
