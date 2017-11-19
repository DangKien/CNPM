ngApp.factory('$newService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (title, cateId, tag, file, content) {
		var params = new FormData();
		params.append('title', title || '');
		params.append('cate_id', cateId || '');
		params.append('tag', tag || '');
		params.append('file', file || '');
		params.append('content', content || '');
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
		var url = SiteUrl + "/rest/backend/new/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertNew = function (params) {
		config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/new";
        return $http.post(url, params, config);
	};

	service.action.editNew = function (idnew) {
		var url = SiteUrl + "/rest/backend/new/" + idnew;
        return $http.get(url);
	};

	service.action.updateNew = function (idnew, params) {
		config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/new/" + idnew;
        return $http.post(url, params, config);
	};

	service.action.deleteNew = function (idnew) {
		var url = SiteUrl + "/rest/backend/new/" + idnew;
        return $http.delete(url);
	};

	return service;
});