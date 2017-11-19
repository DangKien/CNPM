ngApp.factory('$albumService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (name, image) {
		var params = new FormData();
		params.append('name', name || '');
		params.append('imageAlbum', image || '');
		return params;
	};

	service.filter = function (page = 1 , perPage = 8) {
		var params = {
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};
	service.action.listAlbum = function (filter) {
		var url = SiteUrl + "/rest/backend/album/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertAlbum = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/album";
        return $http.post(url, params, config);
	};

	service.action.editAlbum = function (idAlbum) {
		var url = SiteUrl + "/rest/backend/album/" + idAlbum;
        return $http.get(url);
	};

	service.action.updateAlbum = function (idAlbum, params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/album/" + idAlbum;
        return $http.post(url, params, config);
	};

	service.action.deleteAlbum = function (idAlbum) {
		var url = SiteUrl + "/rest/backend/album/" + idAlbum;
        return $http.delete(url);
	};



	return service;
})