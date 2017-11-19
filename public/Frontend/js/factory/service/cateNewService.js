ngApp.factory('$cateNewService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.onePost = function (slugNew) {
		var url = SiteUrl + "/rest/fontend/one-news/" + slugNew;
        return $http.get(url);
	};

	return service;
})