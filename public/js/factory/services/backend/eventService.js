ngApp.factory('$eventService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (name, beginDate, endDate, content) {
		var params = {
			name: name || '',
			beginDate: beginDate || '',
			endDate: endDate || '',
			content: content || '',
		};
		return params;
	};

	service.action.listEvent = function (filter) {
		var url = SiteUrl + "/rest/backend/event/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertEvent = function (params) {
		var url = SiteUrl + "/rest/backend/event";
        return $http.post(url, params);
	};

	service.action.editEvent = function (idCate) {
		var url = SiteUrl + "/rest/backend/event/" + idCate;
        return $http.get(url);
	};

	service.action.updateEvent = function (idCate, params) {
		var url = SiteUrl + "/rest/backend/event/" + idCate;
        return $http.post(url, params);
	};

	service.action.deleteEvent = function (idCate) {
		var url = SiteUrl + "/rest/backend/event/" + idCate;
        return $http.delete(url);
	};



	return service;
})