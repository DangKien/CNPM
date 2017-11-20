ngApp.factory('$fileService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.listFile = function () {
		var url = SiteUrl + "/rest/fontend/file?";
        return $http.get(url);
	};

	return service;
})