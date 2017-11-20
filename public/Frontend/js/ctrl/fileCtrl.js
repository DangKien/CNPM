ngApp.controller('fileCtrl', function ($apply, $rootScope, $scope, $fileService) {

	$scope.data = {
		listFile: {},
	};
	$scope.actions = {
		listFile: function () {
			if (path) {
				$fileService.action.listFile(path).then(function (resp) {
					$scope.data.listFile = resp.data;
				}, function (error) {
					console.log(error);
				});
			}
		},
	}
	$scope.actions.listFile();
	
});