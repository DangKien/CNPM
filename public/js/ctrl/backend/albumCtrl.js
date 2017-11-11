ngApp.controller('AlbumCtrl', function ($apply, $albumService, $scope, changStatus, $conf) {
	$scope.domAlbumModal;
	$scope.domAlbumForm;
	$scope.data = {
		listAlbum: {},
		params: {},
		filter: {},
		title: "",
		idAlbum: '',
		pageAlbum: {},
		allListAlbum:{},
		errors:{},
	};

	$scope.actions = {

		changePage: function (page) {
			console.log(page);
			$scope.data.pageAlbum.page = page;
			$scope.actions.listAlbum();
		},

		// Danh sach loai tin
		listAlbum: function () {
			var params = $albumService.filter($scope.data.pageAlbum.page, 8);
			$albumService.action.listAlbum(params).then(function (resp) {
				$scope.data.listAlbum = resp.data.data;
				$scope.data.pageAlbum = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModal: function () {
			$($scope.domAlbumModal).modal('show');
			$scope.data.errors = {};
			$($scope.domAlbumForm).parsley().reset()
			$scope.data.title = "Thêm mới album";
		},

		saveModalAlbum: function (data) {
			if (data == true) {
				$conf.confirmNotifi('success', 'Thêm mới thành công!!!');
				$($scope.domAlbumModal).modal('hide');
				$scope.actions.listAlbum();
			} else {
				$scope.data.errors = data.errors;
			}
		}

	};
	$scope.actions.listAlbum();
});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var urlAlbum = SiteUrl + "/album";
        var urlImage = SiteUrl + "/fileAlbum";
        $routeProvider.
        when('/', {
            templateUrl: urlAlbum,
            controller: 'AlbumCtrl'
        }).
        when('/:id', {
            templateUrl: urlImage,
            controller: 'ImageCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');
        //$locationProvider.html5Mode(true);
}]);