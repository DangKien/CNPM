ngApp.controller('listNewCtrl', function ($apply, $rootScope, $scope, $listNewService) {
	
	$scope.data = {
		listPost: {},
		pageList: {},
	};
	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageList.current_page = page;
			$scope.actions.listPost();
		},
		paramFilter: function () {
			params = $listNewService.filter($scope.data.pageList.current_page);
			return params;
		},
		listPost: function () {
			var params = $scope.actions.paramFilter();
			if (path) {
				$listNewService.action.listNew(path, params).then(function (resp) {
					$scope.data.listPost = resp.data.data;
					$scope.data.pageList = resp.data;
				}, function (error) {
					console.log(error);
				});
			}
		},
	}
	$scope.actions.listPost();
});