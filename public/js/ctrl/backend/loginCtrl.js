ngApp.controller('loginCtrl', function ($scope) { 
	$scope.data = {
		params: {}
	};
	$scope.actions = {
		login: function () {
			if ($('#formLogin').parsley().validate()){
				var params = {
					email: $scope.data.params.email,
					password: $scope.data.params.password
				};
				document.getElementById("formLogin").submit();
				return false;
			}
		}
	};
});