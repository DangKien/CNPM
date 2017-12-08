ngApp.controller('homeCtrl', function ($apply, $rootScope, $scope, $homeService) {
	
	$scope.data = {
		listSlider: {},
		listLibImage: {},
		listNews: {},
		listNotifi: {},
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

		listNews: function () {
			$homeService.action.getNews('tin-tuc').then(function (resp) {
				$scope.data.listNews = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		listNotifi: function () {
			$homeService.action.getNews('thong-bao').then(function (resp) {
				$scope.data.listNotifi = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		listVideos: function () {
			$homeService.action.getVideo().then(function (resp) {
				$scope.data.listVideo = resp.data;
			}, function (error) {
				console.log(error);
			});
		},


	}
	$scope.actions.listSlider();
	$scope.actions.listNews();
	$scope.actions.listNotifi();
	$scope.actions.libImage();
	$scope.actions.listNews();
	$scope.actions.listVideos();
	
});

