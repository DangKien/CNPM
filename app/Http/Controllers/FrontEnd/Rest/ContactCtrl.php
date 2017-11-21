<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactModel;



Class ContactCtrl extends Controller {

    public function getContact (Request $request, ContactModel $contactModel){
    	$this->validateInsert($request);
		$name    = $request->name;
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
			'name'        => 'required',
			'address'     => 'required',
			'phone'       => 'required',
			'email'       => 'required|email',
			'content'     => 'required',
			'vericaptcha' =>'required',
            ], [
			'name.required'        => 'Tên không được để trống',
			'address.required'     => 'Địa chỉ không được để trống',
			'phone.required'       => 'Số điện thoại không được để trống',
			'email.required'       => 'Email không được để trống',
			'email.email'          => 'Email không đúng định dạng',
			'content.required'     => 'Nội dung không được để trống',
			'vericaptcha.required' => 'Xác nhận bạn không phải là robot',
            ]
    	);
    }
    
}
