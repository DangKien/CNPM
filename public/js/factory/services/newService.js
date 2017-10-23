ngApp.factory('$newService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (name, status, newId, tag) {
		var params = {
			name: name || '',
			status: status || '1',
			new_id: newId || '0',
			tag: tag
		};
		return params;
	};

	service.filter = function (name, status, page = 1 , perPage = 10) {
		var params = {
			title: name || '',
			status: status || '',
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};

	service.action.listNew = function (filter) {
		var url = SiteUrl + "/rest/new/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertNew = function (params) {
		var url = SiteUrl + "/rest/new";
        return $http.post(url, params);
	};

	service.action.editNew = function (idnew) {
		var url = SiteUrl + "/rest/new/" + idnew;
        return $http.get(url);
	};

	service.action.updateNew = function (idnew, params) {
		var url = SiteUrl + "/rest/new/" + idnew;
        return $http.put(url, params);
	};

	service.action.deleteNew = function (idnew) {
		var url = SiteUrl + "/rest/new/" + idnew;
        return $http.delete(url);
	};

	return service;
});