<?php

namespace App\Http\Controllers\BackEnd\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserModel;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login-backend'); 
    }

    public function postLogin(Request $request, UserModel $userModel ) {
        $this->validateLogin($request);
        $email    = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('backend/view/user');
        } else {
            $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
       

    }


    public function validateLogin($request) {
        return $this->validate($request, [
            'email'    => 'required|string|email',
            'password' => 'required|string|between:6,25',
            ], [
            'email.required'    => 'Email không được để trống',
            'email.email'       => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'email.string'      => 'Email phải là chuỗi kí tự',
            'password.string'   => 'Mật khẩu cần là chuỗi kí tự',
            'password.between'  => 'Mật khẩu phải có 6 đến 25 kí tự',

            ]
        );
    }
}
