ngApp.factory('$imageService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.albumImage = function (slugNew) {
		var url = SiteUrl + "/rest/fontend/album";
        return $http.get(url);
	};

	service.action.image = function (idAlbum) {
		var url = SiteUrl + "/rest/fontend/image-album/" + idAlbum;
        return $http.get(url);
	};

	service.action.album = function (idAlbum, page) {
		var url = SiteUrl + "/rest/fontend/album-name/" + idAlbum + "?" + $httpParamSerializer(page);
        return $http.get(url);
	};

	return service;
})