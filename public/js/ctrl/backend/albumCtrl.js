ngApp.controller('AlbumCtrl', function ($apply, $albumService, $scope, changStatus, $conf) {
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
			$scope.data.pageAlbum.current_page = page;
			$scope.actions.listAlbum();
		},

		// Danh sach loai tin
		listAlbum: function () {
			$albumService.action.listAlbum().then(function (resp) {
				$scope.data.listAlbum = resp.data.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModal: function () {
			$('#album').modal('show');
			$('#album-form').parsley().reset()
			$scope.data.title = "Thêm mới album";
		},

		saveModalAlbum: function (data) {
			if (data == true) {
				$conf.confirmNotifi('success', 'Thêm mới thành công!!!');
				$('#album').modal('hide');
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