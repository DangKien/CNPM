<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;
use App\Models\CateModel;

class NewModel extends MyModel
{
   protected $table = 'news';

    public function users(){
        return $this->belongsTo('App\Models\UserModel', 'user_id');
    }


    public function cates(){
        return $this->belongsTo('App\Models\CateModel', 'cate', 'id');
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

    public function filterSlug ($param) {
        if (!empty($param))
        {
            $idCate = CateModel::where('slug', $param)->first()->id;
            
            $this->setFunctionCond('where', ['cate', $idCate]);
        }
        return $this;
    }
}
