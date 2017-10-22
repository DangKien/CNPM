ngApp.factory('$cateService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (name, status, cateId, tag) {
		var params = {
			name: name || '',
			status: status || '1',
			cate_id: cateId || '0',
			tag: tag
		};
		return params;
	};

	service.filter = function (name, status, page = 1 , perPage = 10) {
		var params = {
			name: name || '',
			status: status || '',
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};
	service.action.listCate = function (filter) {
		var url = SiteUrl + "/rest/cate/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.allListCate = function (filter) {
		var url = SiteUrl + "/rest/cate/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertCate = function (params) {
		var url = SiteUrl + "/rest/cate";
        return $http.post(url, params);
	};

	service.action.editCate = function (idCate) {
		var url = SiteUrl + "/rest/cate/" + idCate;
        return $http.get(url);
	};

	service.action.updateCate = function (idCate, params) {
		var url = SiteUrl + "/rest/cate/" + idCate;
        return $http.put(url, params);
	};

	service.action.deleteCate = function (idCate) {
		var url = SiteUrl + "/rest/cate/" + idCate;
        return $http.delete(url);
	};



	return service;
})