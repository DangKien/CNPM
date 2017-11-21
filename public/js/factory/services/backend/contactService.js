	
ngApp.factory('$contactService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.action.listContact = function () {
		var url = SiteUrl + "/rest/backend/contact";
        return $http.get(url);
	};
	return service;
})