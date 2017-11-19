<?php

namespace App\Http\Controllers\FrontEnd\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\SlideModel;
use App\Models\FileImageModel;


Class IntroduceCtrl extends Controller {

    public function getIntroduce (){
    	if (request()->is('gioi-thieu')) {
    		return view('front.content.introduce.introduce');
    	}
        
    }


    
}
