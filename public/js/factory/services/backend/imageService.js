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

	service.editImageData = function (name) {
		var params = {
			name: name,
		}
		return params;
	};

	service.filter = function (albumId ,page = 1 , perPage = 16) {
		var params = {
			albumId: albumId,
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};
	service.action.listImage = function (filter) {
		var url = SiteUrl + "/rest/backend/image/?" + $httpParamSerializer(filter);
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
		var url = SiteUrl + "/rest/backend/image";
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

	service.action.deleteImage = function (idAlbum) {
		var url = SiteUrl + "/rest/backend/image/" + idAlbum;
        return $http.delete(url);
	};

	service.action.updateImage = function (idAlbum, params) {
		var url = SiteUrl + "/rest/backend/image/" + idAlbum;
        return $http.post(url, params);
	};

	service.action.editImage = function (idImage) {
		var url = SiteUrl + "/rest/backend/image/" + idImage;
        return $http.get(url);
	};


	return service;
})