<?php

namespace App\Http\Controllers\FrontEnd\Modal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddMissionModel;
use DB;


Class ModalCtrl extends Controller {

	public function modal($view) {
		return view('front.modal.'.$view);
	}
    
}
