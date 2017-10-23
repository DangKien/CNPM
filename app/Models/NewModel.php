<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class NewModel extends MyModel
{
   protected $table = 'news';

    public function users(){
        return $this->belongsTo('App\Models\UserModel', 'user_id');
    }


    public function cates(){
        return $this->belongsTo('App\Models\CateModel', 'cate');
    }

   public function filterTitle ($param) {
    	if (!empty($param))
    	{
    		$this->setFunctionCond('where', ['title', 'like', '%'.$param.'%']);
    	}
    	return $this;
    }

     public function filterCate ($param) {
    	if (!empty($param))
    	{    
            $this->setFunctionCond('where', ['cate', $param]);
    	}
    	return $this;
    }

     public function filterStatus ($param) {
    	if (!empty($param))
    	{
    		$this->setFunctionCond('where', ['status', $param]);
    	}
    	return $this;
    }
}
