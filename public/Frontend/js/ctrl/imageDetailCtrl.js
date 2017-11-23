ngApp.controller('imageDetailCtrl', function ($apply, $rootScope, $scope, $imageService) {
	$scope.idAlbum = idAlbum.trim();
	$scope.data = {
		albumImage: {},
		pageImage: {},
		albumName: {},
	};
	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageImage.current_page = page;
			$scope.actions.album();
		},

		albumName: function () {
			$imageService.action.album($scope.idAlbum).then(function (resp) {
				$scope.data.albumName = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		album: function () {
			$scope.actions.albumName();
			$imageService.action.image($scope.idAlbum).then(function (resp) {
				$scope.data.albumImage = resp.data.data;
				$scope.data.pageImage  = resp.data;
			}, function (error) {
				console.log(error);
			});
		},
	}
	$scope.actions.album();
});