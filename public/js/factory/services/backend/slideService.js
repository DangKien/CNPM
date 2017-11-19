ngApp.factory('$slideService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
	};

	service.data = function (title, content, imageSlide, status) {
		var params = new FormData();
		params.append('title', title || '');
		params.append('content', content || '');
		params.append('imageSlide', imageSlide || '');
		params.append('status', status || '');
		return params;
	};


	service.action.listSlide = function (page) {
		var url = SiteUrl + "/rest/backend/slide/?" + $httpParamSerializer(page);
        return $http.get(url);
	};


	service.action.insertSlide = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/slide";
        return $http.post(url, params, config);
	};

	service.action.editSlide= function (idslide) {
		var url = SiteUrl + "/rest/backend/slide/" + idslide;
        return $http.get(url);
	};

	service.action.updateSlide = function (idslide, params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/slide/" + idslide;
        return $http.post(url, params, config);
	};

	service.action.deleteSlide = function (idslide) {
		var url = SiteUrl + "/rest/backend/slide/" + idslide;
        return $http.delete(url);
	};



	return service;
})