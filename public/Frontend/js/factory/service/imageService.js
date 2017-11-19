ngApp.factory('$imageService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.albumImage = function (slugNew) {
		var url = SiteUrl + "/rest/fontend/album";
        return $http.get(url);
	};

	return service;
})