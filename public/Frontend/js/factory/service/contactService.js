ngApp.factory('$contactService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};
	service.data = function (name, address, phone, email, content, vericaptcha) {
		var params = {
			name : name || '',
			address: address || '',
			phone: phone || '',
			email: email || '',
			content: content || '',
			vericaptcha: vericaptcha || ''
		}

		return params;
	};
	service.action.contact = function (params) {
		var url = SiteUrl + "/rest/fontend/contact";
        return $http.post(url, params);
	};

	return service;
})