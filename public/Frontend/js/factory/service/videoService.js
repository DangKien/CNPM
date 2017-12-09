ngApp.factory('$videoService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.listVideo = function (page) {
		var url = SiteUrl + "/rest/fontend/listVideo?" + $httpParamSerializer(page);
        return $http.get(url);
	};

	service.action.videoDetail = function (id) {
		var url = SiteUrl + "/rest/fontend/videoDetail/" + id.trim();
        return $http.get(url);
	};

	return service;
})