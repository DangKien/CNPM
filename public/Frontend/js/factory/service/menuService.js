ngApp.factory('$menuService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.listMenu = function () {
		var url = SiteUrl + "/rest/fontend/listMenu";
        return $http.get(url);
	};

	return service;
})