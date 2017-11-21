ngApp.factory('$addmissionService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
	};
	service.data = function (nameStudent, gender, birthday, nameParent, email, phone, address, message) {
		var params = {
			nameStudent: nameStudent || '',
			gender:gender || '',
			birthday:birthday || '',
			nameParent:nameParent || '',
			email: email|| '',
			phone: phone|| '',
			address: address|| '',
			message: message|| '',
		}
		return params;
	};

	service.action.insertAddmission = function (params) {
		var url = SiteUrl + "/rest/fontend/addmission";
        return $http.post(url, params);
	};

	return service;
})