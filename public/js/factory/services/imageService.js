ngApp.factory('$imageService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (idAblum, images) {
		var params = new FormData();
		params.append('idAblum', idAblum || '');
		angular.forEach(images, function(image, key){
			params.append('image['+ key +']', image);
		});

		return params;
	};

	service.filter = function (idAlbum, status, page = 1 , perPage = 10) {
		var params = {
			albumId: idAlbum || '',
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};
	service.action.listImage = function (filter) {
		var url = SiteUrl + "/rest/image/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertImage = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/image";
        return $http.post(url, params, config);
	};

	service.action.editAlbum = function (idAlbum) {
		var url = SiteUrl + "/rest/album/" + idAlbum;
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
		var url = SiteUrl + "/rest/album/" + idAlbum;
        return $http.post(url, params, config);
	};

	service.action.deleteImage = function (idAlbum) {
		var url = SiteUrl + "/rest/image/" + idAlbum;
        return $http.delete(url);
	};



	return service;
})