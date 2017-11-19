ngApp.factory('$listNewService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};
	service.filter = function (page) {
		return params = {
			page: page,
		}
	};
	service.action.listNew = function (slugList, params) {
		var url = SiteUrl + "/rest/fontend/tin-tuc/" + slugList + "?" + $httpParamSerializer(params);
        return $http.get(url);
	};

	return service;
})