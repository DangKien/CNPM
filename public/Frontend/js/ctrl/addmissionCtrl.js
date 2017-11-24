ngApp.controller('addmissionCtrl', function ($apply, $rootScope, $scope, $addmissionService, $conf) {
	$scope.data = {
		listAddMiss: {},
		params: {},
		errors: {},
	};
	$scope.actions = {
		paramsAdd: function () {
			var nameStudent = $scope.data.params.nameStudent;
			var gender      = $scope.data.params.gender;
			var birthday    = moment($scope.data.params.birthday, 'DD-MM-YYYY').format('YYYY-MM-DD');
			var nameParent  = $scope.data.params.nameParent;
			var email       = $scope.data.params.email;
			var phone       = $scope.data.params.phone;
			var address     = $scope.data.params.address;
			var message     = $scope.data.params.message;
			var params      = $addmissionService.data( nameStudent, gender, birthday, nameParent, email, phone, address, message);
			return params;
		},

		insertAddMission: function () {
			if ($($scope.formVal).parsley().validate()) {
				var params = $scope.actions.paramsAdd();
				$addmissionService.action.insertAddmission(params).then(function (resp) {
					$scope.data.errors = {};
					$scope.data.params = {};
					$scope.data.check  = resp.data.status;
				}, function (error) {
					$scope.data.errors = error.data.errors;
				});
			}
		},
	}


});