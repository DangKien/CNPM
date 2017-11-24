ngApp.factory('$eventService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.listEvent = function () {
		var url = SiteUrl + "/rest/fontend/event";
        return $http.get(url);
	};

	return service;
})