ngApp.factory('$fileService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (title, image, file) {
		var params = new FormData();
		params.append('title', title || '');
		params.append('image', image || '');
		params.append('file', file || '');
		return params;
	};

	service.filter = function (page = 1 , perPage = 10) {
		var params = {
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};

	service.action.listFile = function (filter) {
		var url = SiteUrl + "/rest/file/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertFile = function (params) {
		config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/file";
        return $http.post(url, params, config);
	};

	service.action.editFile = function (idFile) {
		var url = SiteUrl + "/rest/file/" + idFile;
        return $http.get(url);
	};

	service.action.updateFile = function (idFile, params) {
		config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/file/" + idFile;
        return $http.post(url, params, config);
	};

	service.action.deleteFile = function (idFile) {
		var url = SiteUrl + "/rest/file/" + idFile;
        return $http.delete(url);
	};

	return service;
});