ngApp.controller('cateNewCtrl', function ($apply, $rootScope, $scope, $cateNewService) {
	$scope.idNews = idNews;
	$scope.data = {
		listPost: {},
	};
	$scope.actions = {
		listPost: function () {
			if (path) {
				$cateNewService.action.onePost(path).then(function (resp) {
					$scope.data.listPost = resp.data;
				}, function (error) {
					console.log(error);
				});
			}
		},

		onePostDetail: function () {
			$cateNewService.action.onePostDetail($scope.idNews).then(function (resp) {
				$scope.data.listPost = resp.data;
			}, function (error) {
				console.log(error);
			});
		},
	}

	if (!$scope.idNews) {
		$scope.actions.listPost();
	} else {
		$scope.actions.onePostDetail();
	}
});