ngApp.factory('$menuService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (week, month, year, cateId, image) {
		var params = new FormData();
		params.append('week', week || '');
		params.append('month', month || '');
		params.append('year', year || '');
		params.append('cateId', cateId || '');
		params.append('image', image || '');

		return params;
	};

	service.filter = function (page = 1 , perPage = 8) {
		var params = {
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};
	service.action.listMenu = function (filter) {
		var url = SiteUrl + "/rest/backend/menu/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.listCateMenu = function () {
		var url = SiteUrl + "/rest/backend/cate-menu";
        return $http.get(url);
	};


	service.action.insertMenu = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/menu";
        return $http.post(url, params, config);
	};

	service.action.editMenu = function (idMenu) {
		var url = SiteUrl + "/rest/backend/menu/" + idMenu;
        return $http.get(url);
	};

	service.action.updateMenu = function (idMenu, params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/menu/" + idMenu;
        return $http.post(url, params, config);
	};

	service.action.deleteMenu = function (idMenu) {
		var url = SiteUrl + "/rest/backend/menu/" + idMenu;
        return $http.delete(url);
	};



	return service;
})