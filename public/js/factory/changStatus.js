ngApp.factory('changStatus', function(){

	var service = {};

	service.change =  function ($data) {
		angular.forEach($data, function(item, key){
			if (item.status == 1) {
				$data[key].status = "Hoạt động";
			} else {
				$data[key].status = "Không hoạt động";
			}
		});
	};

	return service;
})