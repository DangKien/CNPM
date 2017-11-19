ngApp.controller('imageCtrl', function ($apply, $rootScope, $scope, $imageService) {
	
	$scope.data = {
		albumImage: {},
		pageAlbum : {},
	};
	$scope.actions = {
		albumImage: function () {
			if (path) {
				$imageService.action.albumImage(path).then(function (resp) {
					$scope.data.albumImage = resp.data.data;
					$scope.data.pageAlbum  = resp.data;
				}, function (error) {
					console.log(error);
				});
			}
		},
	}
	$scope.actions.albumImage();
});