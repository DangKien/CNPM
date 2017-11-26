<?php 
namespace App\Libs;

use LRedis;
 
class EventSocket {

	public function socketIO($chanel, $data) {
		$redis = LRedis::connection();
		// event can nghe, du lieu la dang json
		$redis->publish($chanel, $data);
	}
}
