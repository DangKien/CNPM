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

ngApp.controller('listCtrl', function ($apply, $rootScope, $scope, $listNewService) {
	
	$scope.data = {
		listPostHot: {},
		checkList: true,
		pageList: {},
	};
	$scope.actions = {
		checkNew: function () {
			console.log(slug)
			if (slug.trim() == 'tin-tuc' || slug.trim() == 'thong-bao') {
				$scope.data.checkList = false;
				var params = {
					perPage: 4,
					view: 'AVAILABLE'
				}
				$listNewService.action.listNew(slug.trim(), params).then(function (resp) {
					$scope.data.listPostHot = resp.data;
					console.log($scope.data.listPostHot);
				}, function (error) {
					console.log(error);
				});
			}
		}
	}
	$scope.actions.checkNew();
});