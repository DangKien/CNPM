ngApp.controller('cateNewCtrl', function ($apply, $rootScope, $scope, $cateNewService) {
	
	$scope.data = {
		listPost: {},
	};
	$scope.actions = {
		listPost: function () {
			if (path) {
				$cateNewService.action.onePost(path).then(function (resp) {
					$scope.data.listPost = resp.data;
					console.log($scope.data.listPost);
				}, function (error) {
					console.log(error);
				});
			}
		},
	}
	$scope.actions.listPost();
});