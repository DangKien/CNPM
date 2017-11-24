ngApp.controller('contactCtrl', function ($apply, $rootScope, $scope, $contactService) {
	$scope.data = {
		listPost: {},
		params: {},
		errors: {},
	};

	$scope.actions = {
		paramsSubmit: function () {
			var name        = $scope.data.params.name;
			var address     = $scope.data.params.address;
			var phone       = $scope.data.params.phone;
			var email       = $scope.data.params.email;
			var content     = $scope.data.params.content;
			var vericaptcha = grecaptcha.getResponse();
			var params = $contactService.data(name, address, phone, email, content, vericaptcha);
			return params;
		},
		submitForm: function () {
			var vericaptcha = grecaptcha.getResponse() || '';
			if ($($scope.formValidate).parsley().validate()) {
				if (vericaptcha) {
					var params = $scope.actions.paramsSubmit();
					$contactService.action.contact(params).then(function (resp) {
						$scope.data.check    = resp.data.status;
						$scope.data.errors = {};
						$scope.data.params = {};
					}, function (error) {
						$scope.data.errors = error.data.errors;
					});
				} else {
					$scope.data.error.captcha = "Không thể gửi liện hệ bằng người máy";
				}
			}
			
		},
	}


});