<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class AlbumModel extends MyModel
{
    protected $table = 'album';

    public function images() {
    	return $this->hasMany('App\Models\FileImageModel', 'album_id', 'id');
    }

    public function filterName ($param) {
    	if (!empty($param))
    	{
    		$this->setFunctionCond('where', ['name', 'like', '%'.$param.'%']);
    	}
    	return $this;
    }
}
