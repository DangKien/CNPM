ngApp.controller('contactCtrl', function ($apply, $contactService, $scope, changStatus, $conf) {
	$scope.data = {
		pageContact: {},
	};

	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageAddmission.current_page = page;
			$scope.actions.listContact();
		},
		listContact: function () {
			$contactService.action.listContact().then(function (resp) {

			}, function (error) {
				console.log(error);
			});
		},
		
	}

	$scope.actions.listContact();
	

});