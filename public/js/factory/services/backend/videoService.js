ngApp.factory('$videoService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (title, content, image, video) {
		var params = new FormData();
		params.append('title', title || '');
		params.append('content', content || '');
		params.append('image', image || '');
		params.append('video', video || '');

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
	service.action.listVideo = function (filter) {
		var url = SiteUrl + "/rest/video/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertVideo = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/video";
        return $http.post(url, params, config);
	};

	service.action.editVideo = function (idVideo) {
		var url = SiteUrl + "/rest/video/" + idVideo;
        return $http.get(url);
	};

	service.action.updateVideo = function (idVideo, params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/video/" + idVideo;
        return $http.post(url, params, config);
	};

	service.action.deleteVideo = function (idVideo) {
		var url = SiteUrl + "/rest/video/" + idVideo;
        return $http.delete(url);
	};



	return service;
})