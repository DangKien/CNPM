<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class MenuModel extends MyModel
{
    protected $table = 'menus';

    public function cates() {
        return $this->belongsTo('App\Models\CateMenuModel', 'cate_menu', 'id');
    }

  //   public function fillterName ($param) {
  //   	if (!empty($param))
  //   	{
  //   		$this->setFunctionCond('where', ['name', 'like', '%'.$param.'%']);
  //   	}
  //   	return $this;
  //   }

  //   public function fillterTitle ($param) {
  //   	if (!empty($param))
  //   	{
  //   		$this->setFunctionCond('where', ['name', 'like', '%'.$param.'%']);
  //   	}
  //   	return $this;
  //   }

  //   public function fillterIdCate ($param) {
		// if (!empty($param)){
		// 	$this->setFunctionCond('where', ['id_cate', $param]);
		// }
    	
    	
  //   	return $this;
  //   }

  //   public function fillterStatus ($param) {

  //   	$this->setFunctionCond('where', ['status', $param]);
    	
  //   	return $this;
  //   }
}
