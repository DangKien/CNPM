<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class CateModel extends MyModel
{
    protected $table = 'catetogys';

    public function users()
    {
        return $this->belongsTo('App\Models\UserModel', 'user_create');
    }

    public function filterName ($param) {
    	if (!empty($param))
    	{
    		$this->setFunctionCond('where', ['name', 'like', '%'.$param.'%']);
    	}
    	return $this;
    }

    function filterStatus($status){
        $this->setFunctionCond('where', ['status', $status]);
        return $this;
    }
}
