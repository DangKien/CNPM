<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ViewController extends Controller
{
	public function user(){
		return view('back.content.user.user', ['active'=>'user'])->with('title', 'Nhân viên trường');
	}

	public function slide(){
		return view('back.content.slide.slide', ['active'=>'slide'])->with('title', 'Slide Ảnh');
	}

	public function cateNew(){
		return view('back.content.new.cate', ['active'=>'newCate'])->with('title', 'Loại tin');
	}

	public function new(){
		return view('back.content.new.new', ['active'=>'new'])->with('title', 'Tin tức ');
	}

	public function dishes(){
		return view('back.content.menu.dishes', ['active'=>'dishes'])->with('title', 'Món ăn');
	}

	public function menu(){
		return view('back.content.menu.menu', ['active'=>'menu'])->with('title', 'Thực đơn');
	}

	public function addmission(){
		return view('back.content.addmission.addmission', ['active'=>'addmission'])->with('title', 'Đơn đăng kí học Online');
	}

	public function class(){
		return view('back.content.addmission.class', ['active'=>'class'])->with('title', 'Lớp học');
	}


	public function fileImage(){
		return view('back.content.libary.image', ['active'=>'file-image'])->with('title', 'Thư viện ảnh');
	}

	public function fileVideo(){
		return view('back.content.libary.video', ['active'=>'file-video'])->with('title', 'Thư viện video');
	}

	public function fileMusic(){
		return view('back.content.libary.music', ['active'=>'file-music'])->with('title', 'Thư viện nhạc');
	}

	public function file(){
		return view('back.content.libary.file', ['active'=>'file'])->with('title', 'Thư viện tài liệu');
	}
}
