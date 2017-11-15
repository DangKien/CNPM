ngApp.controller('homeCtrl', function ($apply, $rootScope, $scope, $homeService) {
	
	$scope.data = {
		listSlider: {},
		listLibImage: {},
	};
	$scope.actions = {
		listSlider: function () {
			$homeService.action.slider().then(function (resp) {
				$scope.data.listSlider = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		libImage: function () {
			$homeService.action.libImage().then(function (resp) {
				$scope.data.listLibImage = resp.data;
			}, function (error) {
				console.log(error);
			});
		},
	}
	$scope.actions.listSlider();
	$scope.actions.libImage();
});