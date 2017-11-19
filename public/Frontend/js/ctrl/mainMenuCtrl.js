ngApp.controller('mainMenuCtrl', function ($apply, $rootScope, $scope, $mainMenuService) {
	
	$scope.data = {
		listMainMenu: {},
	};

	$scope.actions = {
		listMainMenu: function () {
			$mainMenuService.action.mainMenu().then(function (resp) {
				$scope.data.listMainMenu = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		load: function (slug) {
			window.location = SiteUrl + "/" + slug;
		},
	}
	$scope.actions.listMainMenu();
});