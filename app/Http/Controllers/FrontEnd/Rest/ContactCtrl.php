<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use DB;



Class ContactCtrl extends Controller {

    public function getContact (Request $request, ContactModel $contactModel){
    	$this->validateInsert($request);
		$name    = ucwords($request->name);
		$address = $request->address;
		$phone   = $request->phone;
		$email   = $request->email;
		$content = $request->content;
		DB::beginTransaction();
		try {
			$contactModel->name    = $name;
			$contactModel->address = $address;
			$contactModel->phone   = $phone;
			$contactModel->email   = $email;
			$contactModel->content = $content;
			$contactModel->save();
			DB::commit();
			return response()->json(['status'=>true], 200);

		} catch (Exception $e) {
			return response()->json(['message'=>'Lỗi hệ thống'], 422);
		}
		


    }

    public function validateInsert($request) {
    	return $this->validate($request, [
			'name'        => 'required| between: 1,255',
			'address'     => 'required| between: 1,255',
			'phone'       => 'required| numeric| digits_between:6,15',
			'email'       => 'required| email| between: 1,255',
			'content'     => 'required| between: 1,255',
			'vericaptcha' => 'required',
            ], [
			'name.required'        => 'Tên không được để trống',
			'name.between'         => 'Tên phụ huynh không được quá 255 kí tự',
			'address.required'     => 'Địa chỉ không được để trống',
			'address.between'      => 'Địa chỉ không quá 255 kí tự',
			'phone.required'       => 'Số điện thoại không được để trống',
			'phone.numeric'        => 'Số điện thoại không đúng định dạng',
			'phone.digits_between' => 'Số điện thoại từ 6 số đến 15 số',
			'email.required'       => 'Email không được để trống',
			'email.email'          => 'Email không đúng định dạng',
			'email.between'        => 'Email không quá 255 kí tự',
			'content.required'     => 'Nội dung không được để trống',
			'content.between'      => 'Nội dung không quá 255 kí tự',
			'vericaptcha.required' => 'Xác nhận bạn không phải là robot',
            ]
    	);
    }
    
}
