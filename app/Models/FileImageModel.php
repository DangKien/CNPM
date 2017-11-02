<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;
class FileImageModel extends MyModel
{
    protected $table = 'file_images';

    public function filterAlbumId ($album_id) {
    	if (!empty($album_id))
    	{
    		$this->setFunctionCond('where', ['album_id', $album_id]);
    	}
    	return $this;
    }
}
