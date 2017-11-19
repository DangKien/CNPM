ngApp.factory('$homeService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};

	service.action.slider = function () {
		var url = SiteUrl + "/rest/fontend/sidler?";
        return $http.get(url);
	};

	service.action.libImage = function () {
		var url = SiteUrl + "/rest/fontend/libImage?";
        return $http.get(url);
	};

	service.action.getNews = function (slugNew) {
		var url = SiteUrl + "/rest/fontend/news/" + slugNew;
        return $http.get(url);
	};

	return service;
})