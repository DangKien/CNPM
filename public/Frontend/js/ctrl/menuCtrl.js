ngApp.controller('menuCtrl', function ($apply, $rootScope, $scope, $menuService) {
	$scope.data = {
		listMenu: {},
	};

	$scope.actions = {
		listMenu: function () {
			$menuService.action.listMenu().then(function (resp) {
				$scope.data.listMenu = resp.data;
			}, function (error) {
				
			});
		},
			
	}
	$scope.actions.listMenu();

});