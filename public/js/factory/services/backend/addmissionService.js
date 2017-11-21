ngApp.factory('$addmissionService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.action.listAddmission = function (filter) {
		var url = SiteUrl + "/rest/backend/addmission";
        return $http.get(url);
	};

	service.action.checkAddmission = function ($idAdd) {
		var url = SiteUrl + "/rest/backend/addmission/" + $idAdd;
        return $http.get(url);
	};
	return service;
})