ngApp.controller('contactCtrl', function ($apply, $contactService, $scope, changStatus, $conf) {
	$scope.data = {
		pageContact: {},
		listContact: {},
	};

	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageContact.current_page = page;
			$scope.actions.listContact();
		},
		listContact: function () {
			$contactService.action.listContact({page: $scope.data.pageContact.current_page}).then(function (resp) {
				$scope.data.listContact = resp.data.data;
				$scope.data.pageContact = resp.data;
			}, function (error) {
				console.log(error);
			});
		},
		
	}

	$scope.actions.listContact();
	

});