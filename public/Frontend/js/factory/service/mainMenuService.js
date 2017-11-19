ngApp.factory('$mainMenuService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.mainMenu = function () {
		var url = SiteUrl + "/rest/fontend/mainMenu?";
        return $http.get(url);
	};

	return service;
})